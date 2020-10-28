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
        $_SESSION['page'] = "login";
        include_once "includes/header.php";
	?>
    <div id="content" style="margin-bottom: 158px;">
        <div class="container">
            <div class="row">
                <?php if (isset($_GET["gagal"])) : ?>
                <div class="alert alert-danger col-md-12 mt-3" role="alert">
                    Gagal Login
                </div>
                <?php endif ?>
                <?php if (isset($_SESSION['msg'])) : ?>
                <div class="alert alert-warning col-md-12 mt-3" role="alert">
                    <?php echo $_SESSION['msg'] ?>
                </div>
                <?php endif ?>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-4 mb-4 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="loginProcess.php" method="post" enctype="multipart/form-data">
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
                                        <i class="fa fa-user-md"></i>&nbsp; Login
                                    </button>
                                    <p class="mt-3">
                                        Apakah anda belum punya akun ? <a href="register.php">Daftar Sekarang</a>
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