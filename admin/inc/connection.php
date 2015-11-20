<?php
$base_url='http://localhost/westvillage/';
session_start();
$host = 'localhost';
$db = 'west_village';
$user = 'root';
$password = '';
mysql_connect($host, $user, $password);
mysql_select_db($db);

function cek_login() {
    if ($_SESSION['login'] == NULL) {
        header('location: login.php');
    }
}

function login($username, $password) {
    $query = "Select * from admin where username='$username' AND password='" . md5($password) . "'";
    $result = mysql_query($query);
    if ($result == NULL) {
        $_SESSION['flash_warning'] = 'Username/Password was wrong';
        header('location: login.php');
    } else {
        while ($row = mysql_fetch_array($result)) {
            $_SESSION['login'] = $username;
            
        }
        header('location: index.php');
    }
}

function logout(){
    unset($_SESSION['login']);
    header('location: login.php');
    
}
?>

