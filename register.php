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
        require_once 'includes/connection.php';
        session_start();
        $_SESSION['page'] = "register";
        include_once "includes/header.php";
	?>

    <div id="content" class="pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="navigasi-breadcrumb">
                        <ol class="breadcrumb nav-breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <?php if (isset($_GET["berhasil"])) : ?>
                <div class="alert alert-success col-md-12" role="alert">
                    Berhasil Menambahkan
                </div>
                <?php endif ?>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Buat Akun Baru Anda</h3>
                        </div>
                        <div class="card-body">
                            <form action="registerProcess.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="text-center">
                                    <button name="register" type="submit" class="btn btn-primary">
                                        <i class="fa fa-user-md"></i>&nbsp; Register
                                    </button>
                                    <p class="mt-3">
                                        Apakah anda sudah punya akun ? <a href="login.php">Log in</a>
                                    </p>
                                </div>
                            </form>
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