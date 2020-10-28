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
        include_once "includes/header.php";
        $id = $_GET['GetID'];
        $query = " select * from tbl_product where id_product='" . $id . "'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $idProduct = $row['id_product'];
            $namaProduct = $row['nama_product'];
            $hargaProduct = $row['harga_product'];
            $gambarProduct = $row['gambar_product'];
        }
	?>

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
                                        <input type="text" name="idproduk" class="form-control" value="<?= $idProduct ?>" readonly>
                                    </div>
								</div>
								<div class="form-group row">
                                    <label class="col-md-3 control-label">Nama Produk</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama" class="form-control" value="<?= $namaProduct ?>" >
                                    </div>
								</div>
								<div class="form-group row">
                                    <label class="col-md-3 control-label">Harga Produk</label>
                                    <div class="col-md-9">
                                        <input type="text" name="harga" class="form-control" value="<?= $hargaProduct ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Gambar</label>
                                    <div class="col-md-6">

                                        <input type="file" class="form-control-file" name="gambar">
                                        <br>
                                        <img src="../assets/images/<?php echo $gambarProduct; ?>" width="160px" height="200px">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">
										<button class="btn btn-primary form-control" name="update">
											<i class="fa fa-save"></i>
											Update Produk
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
    if(isset($_POST['update'])){
    $idProduct = $_POST['idproduk'];
    $namaProduct = $_POST['nama'];
    $hargaProduct = $_POST['harga'];
    $c_image= $_POST['idproduk'].".jpg";
    $c_image_temp=$_FILES['gambar']['tmp_name'];
    //echo "../assets/images/".$c_image;
    if($c_image_temp != ""){
        unlink( "../assets/images/".$c_image);
        move_uploaded_file($c_image_temp,"../assets/images/".$c_image);
        $c_update="UPDATE tbl_product set nama_product='$namaProduct', harga_product='$hargaProduct', gambar_product= '$c_image'
        where id_product='$idProduct'";   
    }else
    {
        $c_update="update tbl_product set nama_product='$namaProduct', harga_product='$hargaProduct'
        where id_product='$idProduct'";
    }
    $run_update=mysqli_query($con, $c_update);
    if($run_update){
        echo"<script>alert('Data Barang Berhasil DiUpdate')</script>";
        echo"<script>window.open('index.php','_self')</script>";   
    }
  }
?>