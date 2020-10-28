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
                            <a class="nav-link active" href="index.php">Product<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="penjualan.php">Penjualan</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix">
                <a href="insert_product.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-plus"></i>
                    <span>Tambahkan Produk</span>
                </a>
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
                                <h3>Daftar Product</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Id Product</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Gambar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            function rupiah($angka){
                        
                                                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                                return $hasil_rupiah;
                                            
                                            }
                                            $data = $con->query("SELECT * FROM tbl_product ORDER BY id_product ASC");
                                            while ($row = $data->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["id_product"]; ?></td>
                                                <td><?php echo $row["nama_product"]; ?></td>
                                                <td><?php echo rupiah($row["harga_product"]); ?></td>
                                                <td><img src="../assets/images/<?php echo $row["gambar_product"]; ?>">
                                                </td>
                                                <td>
                                                    <a href="edit_product.php?GetID=<?php echo $row['id_product'];?>"
                                                        class="btn btn-primary"><i
                                                            class="fa fa-pencil-alt"></i></a>&nbsp|&nbsp
                                                    <a href="delete_product.php?id=<?php echo $row['id_product'];?>"
                                                        class="btn btn-primary"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
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