<?php 
include_once './inc/connection.php';
$username=$_POST['username'];
$password=$_POST['password'];
login($username, $password);
?>