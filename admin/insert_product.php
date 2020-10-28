<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko Online Feri</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" />
    <link rel="stylesheet" href="../assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/styles/styles.css" />
</head>

<body>
    <?php
		require_once '../includes/connection.php';
	?>
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offer">
                    <h5>Feri Online Store</h5>
                </div>
                <div class="col-md-6">
                    <ul class="menu">
                        <li><a href="customer_register.php">Register</a></li>
                        <li><a href="checkout.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Product<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="penjualan.php">Penjualan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-9 m-auto " id="cart">
                    <div class="card">
                        <div class="card-body">
                            <form class="container" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Id Produk</label>
                                    <div class="col-md-9">
                                        <input type="text" name="idproduk" class="form-control" required>
                                    </div>
								</div>
								<div class="form-group row">
                                    <label class="col-md-3 control-label">Nama Produk</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
								</div>
								<div class="form-group row">
                                    <label class="col-md-3 control-label">Harga Produk</label>
                                    <div class="col-md-9">
                                        <input type="text" name="harga" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Gambar</label>
                                    <div class="col-md-6">

                                        <input type="file" class="form-control-file" name="foto">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">
										<button class="btn btn-primary form-control" name="submit">
											<i class="fa fa-save"></i>
											Insert Produk
										</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 
if (isset($_POST['submit'])) {
	$nama = $_POST['idproduk'].".jpg";
    $lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../assets/images/".$nama);
	mysqli_query($con, "INSERT INTO tbl_product (id_product,nama_product,harga_product,gambar_product) 
    VALUES('$_POST[idproduk]','$_POST[nama]','$_POST[harga]','$nama')");
    echo "<br><div class='alert alert-success text-center'> Data Disimpan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
}
?>