<?php
require_once("includes/connection.php");
session_start();
include 'includes/connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = mysqli_query($con, "select * from users where username='$username' and password='$password'");
    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['username'] = $username;
        if($username == "admin"){
            $_SESSION['login'] = "true";
            header("location:admin/index.php");
        }
        else{
            $_SESSION['login'] = "true";
            header("location:index.php");
        }
        
    }else
        header("location:login.php");
?>