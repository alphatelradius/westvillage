<?php
include_once './inc/head.php';
cek_login();

if (isset($_POST['text']) || isset($_POST['title'])) {
    $text = $_POST['text'];
    $title = $_POST['title'];
    if (isset($_FILES['picture'])) {
        $tempName = $_FILES['picture']['tmp_name'];
        $fileName = $_FILES['picture']['name'];
        $saveDirectory = '../img/';
        if (@move_uploaded_file($tempName, $saveDirectory . $fileName)) {
//                echo ' File Successfully Uploaded!';
            if ($_POST['id'] == '') {
                $query = "INSERT INTO `west_village`.`topping` (`id`, `title`,`text`,`picture`, `date_upload`) VALUES (NULL,'$title','$text', 'img/" . $fileName . "', CURRENT_TIMESTAMP)";
                $_SESSION['warning'] = "Product added successfully";
            } else {
                $id = $_POST['id'];
                $query = "UPDATE `west_village`.`topping` SET `title`='$title',`text`='$text', `picture`= 'img/" . $fileName . "' WHERE id='$id')";
                $_SESSION['warning'] = "Product updated successfully";
            }
            mysql_query($query);
            //echo "<script>alert('okedeh 1');</script>";
        } else {
            if ($_POST['id'] == '') {
                $query = "INSERT INTO `west_village`.`topping` (`id`, `title`,`text`, `date_upload`) VALUES (NULL,'$title','$text', CURRENT_TIMESTAMP)";
                $_SESSION['warning'] = "Product added successfully";
            } else {
                $id = $_POST['id'];
                $query = "UPDATE `west_village`.`product` SET `title`='$title',`text`='$text' WHERE id='$id'";
                $_SESSION['warning'] = "Product updated successfully";
            }
            mysql_query($query);

            //echo "<script>alert('okedeh 2');</script>";
        }
    } else {
        if ($_POST['id'] == '') {
            $query = "INSERT INTO `west_village`.`topping` (`id`, `title`, `date_upload`) VALUES (NULL,'$title', CURRENT_TIMESTAMP)";
        } else {
            $id = $_POST['id'];
            $query = "UPDATE `west_village`.`topping` SET `title`='$title'";
        }
        mysql_query($query);
        //echo "<script>alert('okedeh 3');</script>";
    }
} else {
    $_SESSION['warning'] = "none";
}
?>
<script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<body>
    <div id="wrapper">
        <?php
        include_once './inc/header.php';
        include_once './inc/side_nav.php';
        ?>
        <div id="page-wrapper">
            <!-- /.row -->
            <br><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Headline Info
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" method="POST" action="product_add.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                                        <?php
                                        $query = "select * from product where id=" . $_GET['id'];
                                        $result = mysql_query($query);
                                        $title = '';
                                        $picture = '';
                                        $text = '';
                                        $id = '';
                                        if ($result != NULL) {
                                            while ($row = mysql_fetch_array($result)) {
                                                $title = $row['title'];
                                                $picture = $row['picture'];
                                                $text = $row['text'];
                                                $id = $row['id'];
                                            }
                                        }
                                        ?>
                                        <div class="form-group col-md-10">
                                            <?php if ($picture != '') { ?>
                                                <img style="width: 60%;" src="../<?php echo $picture; ?>"/>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <?php if ($id != '') { ?>
                                                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                                            <?php } ?>
                                            <input type="file" name="picture"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Title</label>
                                            <input class="form-control"  type="text" name="title" value="<?php echo $title ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Text</label>
                                            <textarea class="form-control" rows="3" name="text"><?php echo $text ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-default">Submit Button</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
    <script src="js/ckeditor/config.js"></script>
    <script src="js/ckeditor/custom.js"></script>
    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->
    <script>
    $(".add-slide").click(function () {
        data = "";
        $.ajax({
            type: "POST",
            url: 'slide_add.php',
            data: data,
            success: function (data) {
                app = $(data);

            },
            async: false
        });
        $("#form-content").append(app);

    });

    $("body").on("click", ".delete-form", function () {
        var id = $("#form-rbs section").length;
        var app = '';
        data = "length=" + intId;
        $.ajax({
            type: "POST",
            url: 'slide_delete.php',
            data: data,
            success: function (data) {
                $(this).parent().remove();

            },
            async: false
        });


    });
    </script>
    <script>
        initSample();
    </script>
</body>

</html>
