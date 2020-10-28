<?php
require_once("includes/connection.php");
session_start();
include 'includes/connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = mysqli_query($con, "INSERT INTO users (username,password) VALUES ('$username','$password')");
    if($data){
        header("location:register.php?berhasil");
    }else{
        header("location:register.php?gagal");
    }
?>