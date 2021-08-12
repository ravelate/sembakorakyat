<?php

$thispage = "Home Page";
include 'db/connect.php';
include 'db/functions.php';
include 'layout/header.php';
?>

    <!------------------------------------------
    SLIDER
    ------------------------------------------->
    <section class="slider-section pt-4 pb-4">
        <div class="container">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="nav-category">
                            <h2>Kategori</h2>
                            <ul class="menu-category">
                                <li><a href="#">Beras</a></li>
                                <li><a href="#">Produk Hewani</a></li>
                                <li><a href="#">sayur & buah</a></li>
                                <li><a href="#">garam & gula</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner shadow-sm rounded">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="./assets/img/slides/berasslide.jpg" width="700px" height="300px" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-black bg-light">Beras Berkualitas</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./assets/img/slides/gulaslide.jpg" width="700px" height="300px" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-black bg-light">Garam & gula</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./assets/img/slides/nabahewaslide.jpg" width="700px" height="300px"alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-black bg-light  ">Daging & sayur yang masih fresh</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Slider -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-info mr-4">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="media-body">
                            <h5>Pengiriman Cepat</h5>
                            <p class="text-muted">
                                layanan pengiriman sehari sampai atau hari berikutnya.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-purple mr-4">
                            <i class="fa fa-arrow-down"></i>
                        </div>
                        <div class="media-body">
                            <h5>Pembayaran Virtual</h5>
                            <p class="text-muted">
                                tidak perlu ribet lagi, cukup sekali klik barang terbeli
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                            <i class="fa fa-refresh"></i>
                        </div>
                        <div class="media-body">
                            <h5>Jaminan Pengembalian</h5>
                            <p class="text-muted">
                                uang kembali 100% jika tidak sesuai perjanjian tingkat layanan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->
    <section class="products-grids trending pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Items</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
            <?php
            $datatrending = query("SELECT * FROM barang WHERE jumlah_terjual > 100");
            foreach($datatrending as $dat_trend) :
            ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="product-detail.php?nama_barang=<?= $dat_trend['nama_barang'] ?>&harga=<?= $dat_trend['harga'] ?>&keterangan=<?= $dat_trend['keterangan'] ?>&jumlahterjual=<?= $dat_trend['jumlah_terjual'] ?>&jumlah=<?= $dat_trend['jumlah'] ?>&kategori=<?= $dat_trend['kategori'] ?>&gambar=<?= $dat_trend['gambar'] ?>&id=<?= $dat_trend['id'] ?>">
                                <img src="<?= $dat_trend['gambar'] ?>" class="img-fluid" />
                            </a>
                        </div>
                        <div class="product-content">
                            <h3><a href="product-detail.php?nama_barang=<?= $dat_trend['nama_barang'] ?>&harga=<?= $dat_trend['harga'] ?>&keterangan=<?= $dat_trend['keterangan'] ?>&jumlahterjual=<?= $dat_trend['jumlah_terjual'] ?>&jumlah=<?= $dat_trend['jumlah'] ?>&kategori=<?= $dat_trend['kategori'] ?>&gambar=<?= $dat_trend['gambar'] ?>&id=<?= $dat_trend['id'] ?>"><?= $dat_trend['nama_barang']?></a></h3>
                            <div class="product-price">
                                <span>Rp. <?=$dat_trend['harga']?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    include 'layout/footer.php';
    ?>
    <!-- Core -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/core/jquery-ui.min.js"></script>

    <!-- Optional plugins -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Argon JS -->
    <script src="./assets/js/argon-design-system.js"></script>

    <!-- Main JS-->
    <script src="./assets/js/main.js"></script>
</body>

</html>