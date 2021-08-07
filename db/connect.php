<?php

$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "sembakorakyat";

	$connect = mysqli_connect($host, $user, $pass, $db);

	if(!$connect) {
		die("Koneksi gagal : ".mysql_connect_error());
	}