<?php
    session_start();
    include("includes/connection.php");

    if(!isset($_SESSION["login"])){
        $_SESSION['msg'] = "Anda Harus Login Terlebih Dahulu";
        header("location:login.php");
    }  
    else {
            if(isset($_POST["add_to_cart"]))
            {
                 if(isset($_COOKIE["shopping_cart"]))
                 {
                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                    $cart_data = json_decode($cookie_data, true);
            }
            else 
            {
                $cart_data = array();
            }
            $item_id_list = array_column($cart_data, 'item_id');
            if(in_array($_POST["hidden_id"], $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                  if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
                    {
                       $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                    }
                }
            }
            else
            {
                $item_array = array(
                    'item_id' => $_POST["hidden_id"],
                    'item_name' => $_POST["hidden_name"],
                    'item_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"]
                );
                $cart_data[] = $item_array;
            }

            $item_data = json_encode($cart_data);
            setcookie('shopping_cart', $item_data, time() + (86400 * 30));
            header("location:index.php?success=1");
        }

    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]['item_id'] == $_GET["id"])
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                    header("location:index.php?remove=1");
                }
            }
            if(empty($cart_data)){
                setcookie("shopping_cart", "", time() - 3600);
                header("location:index.php?clearall=1");    
            }
        }

        if($_GET["action"] == "clear") 
        {
            setcookie("shopping_cart", "", time() - 3600);
            header("location:index.php?clearall=1");
        }

        if($_GET["action"] == "buy"){
            if(isset($_COOKIE["shopping_cart"])){
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach($cart_data as $keys => $values){
                    $query = "SELECT order_product FROM tbl_product WHERE id_product='".$values["item_id"]."' LIMIT 1";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_assoc($result);
                    $order = $row['order_product'];
                    $order += $values["item_quantity"];

                    $query2 = "UPDATE tbl_product SET order_product = '".$order."' WHERE id_product='".$values["item_id"]."'";
                    $result2 = mysqli_query($con,$query2);
                }
            }else
                header("location:index.php");
            
            setcookie("shopping_cart", "", time() - 3600);
            header("location:index.php?terbeli=1");    

        }else
            header("location:index.php");
    
    }
}
?>