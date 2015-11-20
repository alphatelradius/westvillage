<?php
include_once './inc/head.php';
cek_login();
if (isset($_POST['title'])) {
    $title=$_POST['title'];
    if (isset($_FILES['picture'])) {
        $tempName = $_FILES['picture']['tmp_name'];
        $fileName = $_FILES['picture']['name'];
        $saveDirectory = '../img/';
        if (@move_uploaded_file($tempName, $saveDirectory . $fileName)) {
//                echo ' File Successfully Uploaded!';
            if ($_POST['id'] == '') {
                $query = "INSERT INTO `topping` (`id`, `title`,`picture`, `date_upload`) VALUES (NULL,'$title', 'img/" . $fileName . "', CURRENT_TIMESTAMP)";
            } else {
                $id=$_POST['id'];
                $query = "UPDATE `topping` SET `title`='$title', `picture`= 'img/" . $fileName . "' WHERE id='$id')";
            }
            mysql_query($query);
            //echo "<script>alert('okedeh 1');</script>";
        } else {
             if ($_POST['id'] == '') {
                $query = "INSERT INTO `topping` (`id`, `title`, `date_upload`) VALUES (NULL,'$title', CURRENT_TIMESTAMP)";
            } else {
                $id=$_POST['id'];
                $query = "UPDATE `topping` SET `title`='$title' WHERE id='$id'";
            }
            mysql_query($query);
            //echo "<script>alert('okedeh 2');</script>";
        }
    }else{
         if ($_POST['id'] == '') {
                $query = "INSERT INTO `topping` (`id`, `title`, `date_upload`) VALUES (NULL,'$title', CURRENT_TIMESTAMP)";
            } else {
                $id=$_POST['id'];
                $query = "UPDATE `topping` SET `title`='$title'";
            }
            mysql_query($query);
            //echo "<script>alert('okedeh 3');</script>";
    }
}else{
    //echo "<script>alert('okedeh');</script>";
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
                            <?php echo $query; ?>
                            Manage Toppings Info
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" method="POST" action="topping_add.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                                        <?php
                                        $query = "select * from topping where id=" . $_GET['id'];
                                        $result = mysql_query($query);
                                        $title = '';
                                        $picture = '';
                                        $id = '';
                                        while ($row = mysql_fetch_array($result)) {
                                            $title = $row['title'];
                                            $picture = $row['picture'];
                                            $id = $row['id'];
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
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
