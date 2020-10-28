<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko Online Feri</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" />
    <link rel="stylesheet" href="assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/styles/styles.css" />
</head>

<body>
    <?php
        session_start();
        unset($_SESSION["page"]);
        $_SESSION["page"] = "cart";
        if(!isset($_SESSION["login"])){
            $_SESSION['msg'] = "Anda Harus Login Terlebih Dahulu";
            header("location:login.php");
        } 
        include_once "includes/header.php";
	?>
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="navigasi-breadcrumb">
                        <ol class="breadcrumb nav-breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-8" id="cart">
                    <div class="card">
                        <div class="card-body">
                            <form action="cart.php" method="post" enctype="multipart-form-data">
                                <h3>Keranjang Belanja</h3>
                                <p class="text-muted">
                                    Saat ini Anda memiliki <?php echo $quantity; ?> item dalam keranjang Anda.
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											if(isset($_COOKIE["shopping_cart"])){
												$total = 0;
												$cookie_data = stripslashes($_COOKIE['shopping_cart']);
												$cart_data = json_decode($cookie_data, true);
												foreach($cart_data as $keys => $values)
											{?>
                                            <tr>
                                                <td><?php echo $values["item_name"]; ?></td>
                                                <td class="text-center"><?php echo $values["item_quantity"]; ?></td>
                                                <td class="text-center">Rp.
                                                    <?php echo number_format($values["item_price"]); ?></td>
                                                <td class="text-center">Rp.
                                                    <?php echo number_format($values["item_quantity"] * $values["item_price"]);?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-secondary" href="cartproc.php?action=delete&id=<?php echo $values["item_id"]; ?>">
													<i class="fas fa-trash-alt"></i>
													</a></td>
                                            </tr>
                                            <?php 
												$total = $total + ($values["item_quantity"] * $values["item_price"]);
											}}?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Total </th>
                                                <th colspan="2">Rp.<?php echo number_format($total) ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="float-left">
                                        <a href="index.php" class="btn btn-secondary btn-sm">
                                            <i class="fa fa-chevron-left"></i>
                                            Lanjutkan Belanja
                                        </a>
                                    </div>
                                    <div class="float-right">
                                        <a href="cartproc.php?action=buy" class="btn btn-success btn-sm">
											Lanjutkan ke pembayaran
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="order-summary">
                        <div class="card-header">
                            <h5>Ringkasan Pesanan</h5>
                        </div><!-- card-header ends -->
                        <div class="card-body">
                            <p class="text-muted">
								Pengiriman dan biaya tambahan dihitung berdasarkan nilai yang telah Anda masukkan.
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal Pemesanan</td>
                                            <th>Rp.<?php echo number_format($total) ?></th>
                                        </tr>
                                        <tr>
                                            <td>Pengiriman dan Penanganan</td>
                                            <td>Rp.0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Pajak</td>
                                            <td>Rp.0.00</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>Rp.<?php echo number_format($total) ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include_once "includes/footer.php"; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html> 