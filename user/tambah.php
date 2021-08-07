<?php
if( isset($_POST['tambah']) ) {
        $barang_id = $_POST['barang_id'];
        $user_id = $_POST['user_id'];
        $jumlah_beli = $_POST['jumlah_beli'];
       $response = mysqli_query($connect, "INSERT INTO `sembakorakyat`.`keranjang` (`barang_id`, `user_id`, `jumlah_beli`) VALUES ('$barang_id', '$user_id', '$jumlah_beli')");
    if($response==true) {
        $jumlah = $_POST['jumlah'];
        $jumlah_terjual = $_POST['jumlah_terjual'];

        $jumlah = $jumlah - $jumlah_beli;
        $jumlah_terjual = $jumlah_terjual + $jumlah_beli;

        mysqli_query($connect, "UPDATE `sembakorakyat`.`barang` SET `jumlah`='$jumlah', `jumlah_terjual`='$jumlah_terjual' WHERE  `id`=$barang_id");
        header('Location: keranjang.php');
        exit();
    }
       $error = true;
      }