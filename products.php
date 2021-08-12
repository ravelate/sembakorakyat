<?php
$thispage = "Product";
include 'db/connect.php';
include 'db/functions.php';
    include 'layout/header.php';
    if (isset($_SESSION['cari'])) {
        $cari = $_SESSION['cari'];
        $datacari = search($cari);
        }else {
            $cari = query("SELECT * FROM barang WHERE jumlah_terjual > 100");
        }
?>
    <!------------------------------------------
    Page Header
    ------------------------------------------->
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </div>
    </section>
    <section class="products-grid pb-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <div class="widget-title">
                                <h3>Shop by Price</h3>
                            </div>
                            <div class="widget-content shop-by-price">
                                <form method="GET" action="/tesas">
                                    <div class="price-filter">
                                        <div class="price-filter-inner">
                                            <div id="slider-range"></div>
                                            <div class="price_slider_amount">
                                                <div class="label-input">
                                                    <input type="text" id="amount" name="price"
                                                        placeholder="Add Your Price" />
                                                    <button type="submit">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="products-top">
                                <div class="products-top-inner">
                                    <div class="products-found">
                                        <p><span><?= count($datacari)?></span> products found</span></p>
                                    </div>
                                    <!-- <div class="products-sort">
                                        <span>Sort By : </span>
                                        <select>
                                            <option>Default</option>
                                            <option>Price</option>
                                            <option>Recent</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($datacari as $hasil) : ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="product-detail.php?nama_barang=<?= $hasil['nama_barang'] ?>&harga=<?= $hasil['harga'] ?>&keterangan=<?= $hasil['keterangan'] ?>&jumlahterjual=<?= $hasil['jumlah_terjual'] ?>&jumlah=<?= $hasil['jumlah'] ?>&kategori=<?= $hasil['kategori'] ?>&gambar=<?= $hasil['gambar'] ?>&id=<?= $hasil['id'] ?>">
                                        <img src="<?= $hasil['gambar'] ?>" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-detail.php?nama_barang=<?= $hasil['nama_barang'] ?>&harga=<?= $hasil['harga'] ?>&keterangan=<?= $hasil['keterangan'] ?>&jumlahterjual=<?= $hasil['jumlah_terjual'] ?>&jumlah=<?= $hasil['jumlah'] ?>&kategori=<?= $hasil['kategori'] ?>&gambar=<?= $hasil['gambar'] ?>&id=<?= $hasil['id'] ?>"><?= $hasil['nama_barang'] ?></a></h3>
                                    <div class="product-price">
                                        <span><?= $hasil['harga'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
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