<?php
include_once './inc/head.php';
cek_login();
if (isset($_POST['product_text']) || isset($_POST['product_sub_text']) || isset($_POST['topping_text']) || isset($_POST['topping_sub_text']) || isset($_POST['contact_text'])) {
    $product_text = $_POST['product_text'];
    $product_sub_text = $_POST['product_sub_text'];
    $topping_text = $_POST['topping_text'];
    $topping_sub_text = $_POST['topping_sub_text'];
    $contact_text = $_POST['contact_text'];
    $query = "UPDATE `west_village`.`heading` SET "
            . "`product_text` = '$product_text',"
            . " `product_sub_text` = '$product_sub_text', "
            . "`topping_text` = '$topping_text', "
            . "`topping_sub_text` = '$topping_sub_text',"
            . " `contact_text` = '$contact_text' WHERE `heading`.`id` = 1;";
    mysql_query($query);
    $_SESSION['warning'] = "Setting Heading Text successfully";
} else {
    $_SESSION['warning'] = "none";
}
?>
<script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({
        mode: "textareas",
        editor_selector: "mceEditor",
        editor_deselector: "mceNoEditor"});
</script>
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
                            Manage Heading Texts
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
                                    <form role="form" method="POST" action="setting_heading.php" enctype="multipart/form-data">
                                        <?php
                                        $query = "select * from heading where id=1";
                                        $result = mysql_query($query);
                                        while ($row = mysql_fetch_array($result)) {
                                            $product_text = $row['product_text'];
                                            $product_sub_text = $row['product_sub_text'];
                                            $topping_text = $row['topping_text'];
                                            $topping_sub_text = $row['topping_sub_text'];
                                            $contact_text = $row['contact_text'];
                                        }
                                        ?>
                                        <div class="form-group col-md-12">
                                            <label>Product Text</label>
                                            <textarea class="mceEditor form-control" rows="8" name="product_text"><?php echo $product_text ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Sub Text</label>
                                            <textarea class="mceEditor form-control" rows="8" name="product_sub_text"><?php echo $product_sub_text ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Topping Text</label>
                                            <textarea class="mceEditor form-control" rows="8" name="topping_text"><?php echo $topping_text ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Topping Sub Text</label>
                                            <textarea class="mceEditor form-control" rows="8" name="topping_sub_text"><?php echo $topping_sub_text ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Contact Text</label>
                                            <textarea class="mceEditor form-control" rows="8" name="contact_text"><?php echo $contact_text ?></textarea>
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
