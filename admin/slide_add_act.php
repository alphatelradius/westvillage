<?php
include_once './inc/connection.php';
$text=$_POST['text'];
$pic = count($_FILES['picture']['tmp_name']);
for ($i = 0; $i < $pic; $i++) {
    if ($_FILES['picture']['error'][$i] == UPLOAD_ERR_OK) {
        if (isset($_FILES['picture']['tmp_name'][$i])) {
            $tempName = $_FILES['picture']['tmp_name'][$i];
            $fileName = $_FILES['picture']['name'][$i];
            $saveDirectory = '../img/';
            if (@move_uploaded_file($tempName, $saveDirectory . $fileName)) {
//                echo ' File Successfully Uploaded!';
                $query="INSERT INTO `main_slider` (`id`, `picture`, `text`, `date_upload`) VALUES (NULL, 'img/".$fileName."', '".$text[$i]."', CURRENT_TIMESTAMP)";
                mysql_query($query);
            } else {
                //echo 'There was an error while uploading the file.';
            }
        }
    } elseif ($_FILES['picture']['size'][$i] > 100000) {
        //echo 'File is greater than maximum allow file size.';
    }
}
header('location: slide.php');
?>