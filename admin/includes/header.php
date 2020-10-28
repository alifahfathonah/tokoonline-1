<?php
     ?>
    <?php
        require_once 'connection.php';
	?>
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-2 offer">
                   <a href="index.php"><i class="fa fa-shopping-cart">&nbsp;Toko Online Feri</i></a>
                </div>
                <div class="col-md-6">
                    <ul class="menu">
                        <li><a href="">Welcome, <?php echo $_SESSION['username'] ?></a></li>
                        <li><a href="logout.php"><button class="btn btn-sm btn-danger">Log Out</button></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>