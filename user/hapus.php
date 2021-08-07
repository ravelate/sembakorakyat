<?php
if( isset($_POST['delete']) ) {
        $id = $_POST['id'];
       $response = mysqli_query($connect, "DELETE FROM `sembakorakyat`.`keranjang` WHERE  `id`=$id");
    if($response==true) {
        header('Location: keranjang.php');
        exit();
    }
       $error = true;
      }