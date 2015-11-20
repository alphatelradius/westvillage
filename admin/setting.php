<?php
include_once './inc/head.php';
cek_login();
if (isset($_POST['information']) || isset($_POST['primary_address']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['maps']) || isset($_POST['fb']) || isset($_POST['twitter']) || isset($_POST['gplus'])) {
    $information = $_POST['information'];
    $primary_address = $_POST['primary_address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $maps = $_POST['maps'];
    $fb = $_POST['fb'];
    $twitter = $_POST['twitter'];
    $gplus = $_POST['gplus'];
    $id = $_POST['id'];
    $query = "UPDATE `west_village`.`setting` SET "
            . "`information` = '$information',"
            . " `primary_address` = '$primary_address', "
            . "`fb` = '$fb', "
            . "`twitter` = '$twitter',"
            . " `gplus` = '$gplus' WHERE `setting`.`id` = 1;";
    mysql_query($query);
    $_SESSION['warning'] = "Setting updated successfully";
}else{
    $_SESSION['warning'] = "none";
}
?>
<script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({
        mode : "textareas",
        editor_selector : "mceEditor",
        editor_deselector : "mceNoEditor"});
</script>
<body>
    <div id="wrapper">
        <?php
        include_once './inc/header.php';
        include_once './inc/side_nav.php';
        ?>
        <div id="page-wrapper">
            <!-- /.row -->
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage General Setting
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php
                                    if ($_SESSION['warning'] != 'none') {
                                        echo '<div class="alert alert-success">' . $_SESSION['warning'] . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" method="POST" action="setting.php" enctype="multipart/form-data">
                                        <?php
                                        $query = "select * from setting where id=1";
                                        $result = mysql_query($query);
                                        $information = '';
                                        $primary_address = '';
                                        $email = '';
                                        $phone = '';
                                        $maps = '';
                                        $fb = '';
                                        $twitter = '';
                                        $gplus = '';
                                        while ($row = mysql_fetch_array($result)) {
                                            $information = $row['information'];
                                            $primary_address = $row['primary_address'];
                                            $email = $row['email'];
                                            $phone = $row['phone'];
                                            $maps = $row['maps'];
                                            $fb = $row['fb'];
                                            $twitter = $row['twitter'];
                                            $gplus = $row['gplus'];
                                            $id = $row['id'];
                                        }
                                        ?>
                                        <div class="form-group col-md-12">
                                            <label>Email</label>
                                            <input class="form-control"  type="hidden" name="id" value="<?php echo $id ?>"/>
                                            <input class="form-control"  type="text" name="email" value="<?php echo $email ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Phone</label>
                                            <input class="form-control"  type="text" name="phone" value="<?php echo $phone ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Facebook</label>
                                            <input class="form-control"  type="text" name="fb" value="<?php echo $fb ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Twitter</label>
                                            <input class="form-control"  type="text" name="twitter" value="<?php echo $twitter ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>G+</label>
                                            <input class="form-control"  type="text" name="gplus" value="<?php echo $gplus ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Information</label>
                                            <textarea class="mceEditor form-control" rows="9" name="information"><?php echo $information ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Primary Address</label>
                                            <textarea class="mceEditor form-control" rows="8" name="primary_address"><?php echo $primary_address ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Maps</label>
                                            <textarea class="mceNoEditor form-control" rows="8" name="maps"><?php echo $maps ?></textarea>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary" >Submit</button>
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
