<?php

$id = $_GET['id'];
$get = "select * from product where id=$id";
$get_all = mysql_query($get);
while ($row = mysql_fetch_array($get_all)) {
    unlink('../'.$row['picture']);
}
$query = "delete * from product where id=$id";
mysql_query($query);
header('location: product.php');
