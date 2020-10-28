<?php

require_once("includes/connection.php ");

if (isset($_GET['id'])) {
    $idProduct = $_GET['id'];
    $query = " delete from tbl_product where id_product = '" . $idProduct . "'";
    $result = mysqli_query($con, $query);
    if ($result) {
        unlink("../assets/images/".$idProduct.".jpg");
        header("location:index.php");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    header("location:index..php");
}