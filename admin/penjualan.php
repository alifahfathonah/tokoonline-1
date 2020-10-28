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
        session_start();
        include_once "includes/header.php";
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
                            <a class="nav-link" href="index.php">Product<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cart.php">Penjualan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12" id="cart">
                    <div class="card">
                        <div class="card-body">
                            <form action="cart.php" method="post" enctype="multipart-form-data">
                                <h3>Daftar Penjualan Produk</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Produk</th>
                                                <th>Harga</th>
                                                <th class="text-center">Jumlah Terjual</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            $subtotal = 0;
                                            function rupiah($angka){
                        
                                                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                                return $hasil_rupiah;
                                            
                                            }
                                            $data = $con->query("SELECT * FROM tbl_product WHERE order_product NOT IN (0)");
                                            while ($row = $data->fetch_assoc()) {
                                                $subtotal = $row["order_product"] * $row["harga_product"];
                                                $total += $subtotal;
                                        ?>
                                            <tr>
                                                <td><img src="../assets/images/<?php echo $row["gambar_product"]; ?>">
                                                </td>
                                                <td><?php echo $row["nama_product"]; ?></td>
                                                <td><?php echo rupiah($row["harga_product"]); ?></td>
                                                <td class="text-center"><?php echo $row["order_product"]; ?></td>
                                                <td><?php echo rupiah($subtotal); ?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-right">
                                                    <p class="font-weight-bold">Total Penjualan</p>
                                                </td>
                                                <td>
                                                    <p class="font-weight-bold"><?php echo rupiah($total) ?></p>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>