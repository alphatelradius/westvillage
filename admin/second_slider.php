<?php
include_once './inc/head.php';
cek_login();

$text = $_POST['text'];
$pic = count($_FILES['picture']['tmp_name']);
for ($i = 0; $i < $pic; $i++) {
    if ($_FILES['picture']['error'][$i] == UPLOAD_ERR_OK) {
        if (isset($_FILES['picture']['tmp_name'][$i])) {
            $tempName = $_FILES['picture']['tmp_name'][$i];
            $fileName = $_FILES['picture']['name'][$i];
            $saveDirectory = '../img/';
            if (@move_uploaded_file($tempName, $saveDirectory . $fileName)) {
//                echo ' File Successfully Uploaded!';
                $query = "INSERT INTO `second_slider` (`id`, `picture`, `text`, `date_upload`) VALUES (NULL, 'img/" . $fileName . "', '" . $text[$i] . "', CURRENT_TIMESTAMP)";
                mysql_query($query);
            } else {
                //echo 'There was an error while uploading the file.';
            }
        }
    } elseif ($_FILES['picture']['size'][$i] > 100000) {
        //echo 'File is greater than maximum allow file size.';
    }
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
                                            <div>
                                                <div class="form-group col-md-10">
                                                    <img style="width: 60%;" src="<?php echo $base_url . $row['picture']; ?>"/>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <div id='<?php echo $row['id']; ?>' class="del-slide btn btn-danger btn-small"><i class="fa fa-trash-o"></i></div>
                                                </div>
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

        $(".del-slide").click(function () {
            var id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "slide_delete_second.php",
                data: {pic_id: id},
                dataType: "text",
                cache: false,
                success:
                        function (data) {
                            console.log(data);
                        }
            });
            $(this).parent().parent().remove();
        });
    </script>
</body>

</html>
