<?php
include_once 'inc/connection.php';
$id = $_POST['pic_id'];
$query = "delete from main_slider where id='$id'";
mysql_query($query);
echo 'TRUE';
?>