<?php
include_once './inc/head.php';
cek_login();
?>
<script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<!--<script>
    window.CKEDITOR_BASEPATH = 'http://localhost/westvillage/admin/ckeditor/';
</script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js"></script>
<script src="ckeditor/config.js"></script>
<link rel="stylesheet" href="ckeditor/css/samples.css">
<link rel="stylesheet" href="ckeditor/toolbarconfigurator/lib/codemirror/neo.css">-->
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
                                    <form role="form" method="POST" action="headline_add_act.php" enctype="multipart/form-data">
                                        <?php
                                        $query = "select * from headline";
                                        $result = mysql_query($query);
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <div class="form-group col-md-10">
                                                <img style="width: 60%;" src="<?php echo $base_url . $row['pic_1']; ?>"/>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <input type="file" name="pic_1"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Text 1</label>
                                                <textarea class="form-control" rows="3" name="text_1"><?php echo $row['text_1'] ?></textarea>
                                            </div>
                                            <br>
                                            <div class="form-group col-md-10">
                                                <img style="width: 60%;" src="<?php echo $base_url . $row['pic_2']; ?>"/>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <input type="file" name="pic_2"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Text 2</label>
                                                <textarea class="form-control" rows="3" name="text_2"><?php echo $row['text_2'] ?></textarea>
                                            </div>
                                            <br>
                                            <div class="form-group col-md-10">
                                                <img style="width: 60%;" src="<?php echo $base_url . $row['pic_3']; ?>"/>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <input type="file" name="pic_3"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Text 3</label>
                                                <textarea class="form-control" rows="3" name="text_3"><?php echo $row['text_3'] ?></textarea>
                                            </div>
                                            <?php
                                        }
                                        ?>
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
