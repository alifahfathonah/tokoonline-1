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
    $_SESSION['page'] = "index"; 
    include_once "includes/header.php";
    ?>
    <div id="content" class="pt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="navigasi-breadcrumb">
                        <ol class="breadcrumb nav-breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <?php
        			$data = $con->query("SELECT * FROM tbl_product ORDER BY id_product ASC");
        			while ($row = $data->fetch_assoc()) {
        		?>
                <div class="col-md-3 col-sm-6 single">
                    <div class="product">
                        <a href="details.php">
                            <img src="assets/images/<?php echo $row["gambar_product"]; ?>" alt="produk 1"
                                class="img-fluid" />
                        </a>
                        <div class="text mb-2">
                            <form action="cartproc.php" method="POST">
                                <h3><?php echo $row["nama_product"]; ?></h3>
                                <p class="price">Rp.<?php echo number_format($row["harga_product"]); ?></p>
                                <div class="input-group">
                                    <input type="text" class="form-control-sm form-control" size="5"
                                        placeholder="Jumlah" name="quantity" required></input>
                                    <input type="hidden" name="hidden_id" value="<?php echo $row['id_product'] ?>" />
                                    <input type="hidden" name="hidden_name"
                                        value="<?php echo $row['nama_product'] ?>" />
                                    <input type="hidden" name="hidden_price"
                                        value="<?php echo $row['harga_product'] ?>" />
                                    <button type="submit" name="add_to_cart" class="btn btn-sm btn-primary">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        	}
        	?>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">First</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Last</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
    </div>
    <?php include_once "includes/footer.php"; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>