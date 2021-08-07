<?php
session_start();
if ( isset($_POST['search']) ) {
    $_SESSION['cari'] = $_POST['keyword'];
    header('Location: products.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SembakoRakyat | <?= $thispage ?></title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="./assets/css/font-awesome.css" rel="stylesheet">

    <!-- Jquery UI -->
    <link type="text/css" href="./assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="./assets/css/argon-design-system.min.css" rel="stylesheet">

    <!-- Main CSS-->
    <link type="text/css" href="./assets/css/style.css" rel="stylesheet">

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <header class="header clearfix">
        <div class="top-bar d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                        <ul class="top-links contact-info">
                            <li><i></i></li>
                            <li><i></i></li>
                        </ul>
                    </div>
                    <?php if( isset($_SESSION['login']) ) : ?>
                    <div class="col-6 text-right">
                        <ul class="top-links account-links">
                            <li><i class="fa fa-user-circle-o"></i>Hai, <?= $_SESSION['login_nama'] ?></li>
                            <li><a href="auth/logout.php">Logout</a></li>
                        </ul> 
                    </div>
                    <?php else : ?>
                        <div class="col-6 text-right">
                        <ul class="top-links account-links">
                            <li><i class="fa fa-user-circle-o"></i> <a href="register.php">Register</a></li>
                            <li><i class="fa fa-power-off"></i> <a href="login.php">Login</a></li>
                        </ul>
                    </div>    
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="header-main border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-12 col-sm-6">
                        <a class="navbar-brand mr-lg-5" href="./index.php">
                             <span class="logo">SembakoRakyat</span>
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                        <form action="" method="post" class="search">
                            <div class="input-group w-100">
                                <input name="keyword" id="keyword" type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="search" id="search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php 
                    if( isset($_SESSION['login']) ) :
                        $isi = query("SELECT COUNT(*) FROM keranjang WHERE user_id ={$_SESSION['login_id']}");
                    ?>
                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <div class="single-icon shopping-cart">
                                <a href="keranjang.php"><i class="fa fa-shopping-cart fa-2x"></i></a>
                                <span class="badge badge-default"><?= $isi[0]['COUNT(*)'] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-main navbar-expand-lg navbar-light border-top border-bottom">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
            </div> <!-- container .// -->
        </nav>
    </header>