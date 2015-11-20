<?php
include_once './inc/head.php';
cek_login();
?>
<script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<!-- Page-Level Plugin CSS - Tables -->
<link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
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
                            Manage Products
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" style="margin-bottom: 20px;">
                                    <a href="product_add.php"><div class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Product</div></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Picture</th>
                                                    <th>Text</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "select * from product";
                                                $result = mysql_query($query);
                                                while ($row = mysql_fetch_array($result)) {
                                                    ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><img style="width: 200px;" src="../<?php echo $row['picture']; ?>"/></td>
                                                        <td><?php echo $row['text']; ?></td>
                                                        <td style="width: 100px; text-align: center;" class="center">
                                                            <a href="product_add.php?id=<?php echo $row['id']; ?>"><div class="btn btn-warning btn-small"><i class="fa fa-edit"></i></div></a>
                                                            <a href="product_delete.php?id=<?php echo $row['id']; ?>"><div class="btn btn-danger btn-small"><i class="fa fa-trash-o"></i></div></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->  
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


    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
    </script>
</body>

</html>
