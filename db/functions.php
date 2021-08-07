<?php

function user_registrasi($data) {
    global $connect;

    $nama = (stripslashes($data['nama']));
    $email = (stripslashes($data['email']));
    $password = mysqli_real_escape_string($connect, $data['password']);
    $password2 = mysqli_real_escape_string($connect, $data['password2']);

    if( $password !== $password2 ) {
        echo "<script>
          alert('Password Tidak Sama!');
          </script>";
          return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connect, "INSERT INTO users (email, password, nama) VALUES('$email', '$password', '$nama')");

    return mysqli_affected_rows($connect);
}

function query($query) {
    include 'db/connect.php';
    $result = mysqli_query($connect, $query);
    $rows = []; 
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}
function queryadmin($query) {
    include '../db/connect.php';
    $result = mysqli_query($connect, $query);
    $rows = []; 
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function search($keyword) {
    $query = "SELECT * FROM barang WHERE
              nama_barang LIKE '%$keyword%' OR
              kategori LIKE '%$keyword%' OR
              keterangan LIKE '%$keyword%'
              ";

    return query($query);

}
function updateuser($data) {
    global $connect;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $no_telepon = htmlspecialchars($data['no_telepon']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "UPDATE users SET
                email='$email',
                nama='$nama',
                no_telepon='$no_telepon',
                alamat='$alamat'
                WHERE id=$id
                ";
    mysqli_query($connect,$query);
    return mysqli_affected_rows($connect);
}
function deleteuser($iduser) {
    global $connect;
    $id = $iduser['id'];
    mysqli_query($connect,"DELETE FROM users WHERE id=$id");
    return mysqli_affected_rows($connect);
}
function createbarang($data) {
    global $connect;
    $nama = htmlspecialchars($data['nama_barang']);
    $harga = htmlspecialchars($data['harga']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $gambar = htmlspecialchars($data['gambar']);
    $kategori = htmlspecialchars($data['kategori']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $jumlah_terjual = htmlspecialchars($data['jumlah_terjual']);

    $query = "INSERT INTO `sembakorakyat`.`barang` 
    (`nama_barang`, `keterangan`, `gambar`, `kategori`, `jumlah`, `jumlah_terjual`) 
    VALUES ('$nama', '$keterangan', '$gambar', '$kategori', '$jumlah', '$jumlah_terjual');";
    mysqli_query($connect,$query);
    return mysqli_affected_rows($connect);
}

function deletebarang($idbarang) {
    global $connect;
    $id = $idbarang['id'];
    mysqli_query($connect,"DELETE FROM barang WHERE id=$id");
    return mysqli_affected_rows($connect);
}
function updatebarang($data) {
    global $connect;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama_barang']);
    $harga = htmlspecialchars($data['harga']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $gambar = htmlspecialchars($data['gambar']);
    $kategori = htmlspecialchars($data['kategori']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $jumlah_terjual = htmlspecialchars($data['jumlah_terjual']);

    $query = "UPDATE barang SET
                nama_barang='$nama',
                harga='$harga',
                keterangan='$keterangan',
                gambar='$gambar',
                kategori='$kategori',
                jumlah='$jumlah',
                jumlah_terjual='$jumlah_terjual'
                WHERE id=$id
                ";
    mysqli_query($connect,$query);
    return mysqli_affected_rows($connect);
}