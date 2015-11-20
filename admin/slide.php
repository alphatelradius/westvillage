<?php
include_once './inc/head.php';
cek_login();
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
                            Manage Main Slide Show
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="slide_add_act.php" enctype="multipart/form-data">
                                        <?php
                                        $query_slide = "select * from main_slider";
                                        $result_slider = mysql_query($query_slide);
                                        while ($row = mysql_fetch_array($result_slider)) {
                                            ?>
                                            <div>
                                                <div class="form-group col-md-10">
                                                    <img style="width: 60%;" src="<?php echo $base_url . $row['picture']; ?>"/>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input id="<?php echo $row['id']; ?>" class="del-slide btn btn-danger btn-small" value="X" style="width: 40px;" readonly="TRUE"/>
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
            $(this).parent().parent().remove();
        });
        $(".del-slide").click(function () {
            var id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "slide_delete.php",
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
