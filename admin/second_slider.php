<?php
include_once './inc/head.php';
cek_login();

if (isset($_POST['text'])) {
    $title=$_POST['text'];
    if (isset($_FILES['picture'])) {
        $tempName = $_FILES['picture']['tmp_name'];
        $fileName = $_FILES['picture']['name'];
        $saveDirectory = '../img/';
        if (@move_uploaded_file($tempName, $saveDirectory . $fileName)) {
//                echo ' File Successfully Uploaded!';
            if ($_POST['id'] == '') {
                $query = "INSERT INTO `second_slider` (`id`, `text`,`picture`, `date_upload`) VALUES (NULL,'$title', 'img/" . $fileName . "', CURRENT_TIMESTAMP)";
            } else {
                $id=$_POST['id'];
                $query = "UPDATE `second_slider` SET `text`='$title', `picture`= 'img/" . $fileName . "' WHERE id='$id')";
            }
            mysql_query($query);
            //echo "<script>alert('okedeh 1');</script>";
        } else {
             if ($_POST['id'] == '') {
                $query = "INSERT INTO `second_slider` (`id`, `text`, `date_upload`) VALUES (NULL,'$title', CURRENT_TIMESTAMP)";
            } else {
                $id=$_POST['id'];
                $query = "UPDATE `second_slider` SET `text`='$title' WHERE id='$id'";
            }
            mysql_query($query);
            //echo "<script>alert('okedeh 2');</script>";
        }
    }else{
         if ($_POST['id'] == '') {
                $query = "INSERT INTO `second_slider` (`id`, `text`, `date_upload`) VALUES (NULL,'$title', CURRENT_TIMESTAMP)";
            } else {
                $id=$_POST['id'];
                $query = "UPDATE `second_slider` SET `text`='$title'";
            }
            mysql_query($query);
            //echo "<script>alert('okedeh 3');</script>";
    }
}else{
    //echo "<script>alert('okedeh');</script>";
}
?>

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
                            Manage Second Slide Show
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="second_slider.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                                        <?php
                                        $query_slide = "select * from second_slider";
                                        $result_slider = mysql_query($query_slide);
                                        while ($row = mysql_fetch_array($result_slider)) {
                                            ?>
                                            <div class="form-group col-md-10">
                                                <img style="width: 60%;" src="<?php echo $base_url.$row['picture'];?>"/>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div id='<?php echo $row['id']; ?>' class="del-slide btn btn-danger btn-small"><i class="fa fa-trash-o"></i></div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div id="form-content">
                                            <div class="form-group col-md-10">
                                                <label>Picture</label>
                                                <input type="file" name="picture[]">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="add-slide btn btn-success btn-small"><i class="fa fa-plus"></i></div>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label>Text</label>
                                                <textarea class="form-control" rows="3" name="text[]"></textarea>
                                            </div>
                                            <div class="col-lg-12" style="border-bottom: 1px solid #cccccc; margin-bottom: 20px;"></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
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
</body>

</html>
