<?php
if (!isset($_GET['nama_barang']) ||
!isset($_GET['harga']) ||
!isset($_GET['keterangan']) ||
!isset($_GET['jumlah']) ||
!isset($_GET['gambar'])) {
        
header('Location: index.php');
exit();
}
    $thispage = "Detail-Product";
    include 'db/connect.php';
    include 'db/functions.php';
    include 'user/tambah.php';
    include 'layout/header.php';
?>
    <!------------------------------------------
    Page Header
    ------------------------------------------->
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
            </ol>
        </div>
    </section>
    <section class="product-page pb-4 pt-4">
        <div class="container">
            <div class="row product-detail-inner">
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="product-images" class="carousel slide" data-ride="carousel">
                        <!-- slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active"> <img src="<?= $_GET['gambar'] ?>" alt="Product 1"> </div>
                            <!-- <div class="carousel-item"> <img src="assets/img/products/2.jpg" alt="Product 2"> </div>
                            <div class="carousel-item"> <img src="assets/img/products/3.jpg" alt="Product 3"> </div>
                            <div class="carousel-item"> <img src="assets/img/products/4.jpg" alt="Product 4"> </div> -->
                        </div> <!-- Left right -->
                        <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#product-images" data-slide="next"> <span class="carousel-control-next-icon"></span> </a><!-- Thumbnails -->
                        <!-- <ol class="carousel-indicators list-inline">
                            <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#product-images"> <img src="assets/img/products/1.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#product-images"> <img src="assets/img/products/2.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#product-images"> <img src="assets/img/products/3.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-3" data-slide-to="3" data-target="#product-images"> <img src="assets/img/products/4.jpg" class="img-fluid"> </a> </li>
                        </ol> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-detail">
                        <h2 class="product-name"><?= $_GET['nama_barang'] ?></h2>
                        <div class="product-price">
                            <span class="price">IDR <?= $_GET['harga'] ?></span>
                            <!-- <span class="price-muted">IDR 499.000</span> -->
                        </div>
                        <div class="product-short-desc">
                            <p>
                                <?= $_GET['keterangan'] ?>
                            </p>
                        </div>
                        <div class="product-select">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Telah Terjual Sebanyak</label>
                                    <p class="badge badge-pill badge-info"><?= $_GET['jumlahterjual'] ?> Buah</p>
                                    <br>
                                    <label>Sisa Produk</label>
                                    <p class="badge badge-pill badge-info"><?= $_GET['jumlah'] ?> Buah</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['login_id'] ?>">
                                        <input type="hidden" name="barang_id" value="<?= $_GET['id'] ?>">
                                        <input type="hidden" name="jumlah" value="<?= $_GET['jumlah'] ?>">
                                        <input type="hidden" name="jumlah_terjual" value="<?= $_GET['jumlahterjual'] ?>">
                                        <input type="number" class="form-control" name="jumlah_beli" id="jumlah_beli" value="1"/>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary btn-block" name="tambah" id="tambah" <?php if(!isset($_SESSION['login'])) { echo "disabled"; }?>>Add to Cart</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="btn btn-secondary"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="product-categories">
                            <ul>
                                <li class="categories-title">Categories :</li>
                                <li><a href="#"><?= $_GET['kategori'] ?></a></li>
                            </ul>
                        </div>
                        <!-- <div class="product-tags">
                            <ul>
                                <li class="categories-title">Tags :</li>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">electronics</a></li>
                                <li><a href="#">toys</a></li>
                                <li><a href="#">food</a></li>
                                <li><a href="#">jewellery</a></li>
                            </ul>
                        </div> -->
                        <div class="product-share">
                            <ul>
                                <li class="categories-title">Share :</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-details">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <p><?= $_GET['keterangan'] ?></p>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="review-form">
                                            <h3>Write a review</h3>
                                            <form>
                                                <div class="form-group">
                                                    <label>Your Name</label>
                                                    <input type="text" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Your Review</label>
                                                    <textarea cols="4" class="form-control"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php include 'layout/footer.php'; ?> 
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