<?php
 if( isset($_POST['login']) ) {
session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

   $response = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");

   if( mysqli_num_rows($response) === 1 ) {

    $row = mysqli_fetch_assoc($response);
    if( password_verify($password, $row['password']) ) {
      $_SESSION['login'] = true;
      $_SESSION['login_id'] = $row['id'];
      $_SESSION['login_email'] = $row['email'];
      $_SESSION['login_nama'] = $row['nama'];
      header('Location: index.php');
      exit();
    }
   }
   $error = true;
  }