<?php

$thispage = "Keranjang";
include 'db/connect.php';
include 'db/functions.php';
include 'user/hapus.php';
include 'layout/header.php';
if (!isset($_SESSION['login'])) {
header('Location: index.php');
exit();
}
$isikeranjang = query("SELECT * FROM keranjang WHERE user_id ={$_SESSION['login_id']}");
?>

    <!------------------------------------------
    SLIDER
    ------------------------------------------->
    <section class="slider-section pt-4 pb-4">
        <div class="container">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-4">
                       <p>Produk</p>
                    </div>
                    <div class="col-md-2">
                       <p>Harga Satuan</p>
                    </div>
                    <div class="col-md-2">
                       <p>Kuantitas</p>
                    </div>
                    <div class="col-md-2">
                       <p>Total Harga</p>
                    </div>
                    <div class="col-md-2">
                       <p>Aksi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php foreach ($isikeranjang as $isi) :
    $query = query("SELECT * FROM barang WHERE id = {$isi['barang_id']}");
    ?>
    <section class="slider-section pt-4 pb-4">
        <div class="container">
            <div class="slider-inner">
                <div class="row">
                <div class="col-md-4">
                      <div class="row">
                          <div class="col-md-4">
                              <img class="img-fluid rounded shadow" src="<?= $query[0]['gambar'] ?>" width="105px" height="105px">
                          </div>
                          <div class="col-md-2">
                              <br>
                              <p><?= $query[0]['nama_barang'] ?></p>
                          </div>
                      </div>
                </div>
                    <div class="col-md-2">
                        <br>
                       <p><?= number_format($query[0]['harga'] , 0, ',', '.') ?></p>
                    </div>
                    <div class="col-md-2">
                        <br>
                       <p><?= $isi['jumlah_beli'] ?></p>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <?php $totalbeli = $query[0]['harga'] * $isi['jumlah_beli']; ?>
                       <p><?= number_format($totalbeli , 0, ',', '.') ?></p>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?= $isi['id'] ?>">
                            <button class="btn btn-danger" type="submit" name="delete" id="delete">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>
    <section class="slider-section pt-4 pb-4">
        <div class="container">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-10">
                       
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-primary">Checkout</button>
                    </div>
                </div>
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