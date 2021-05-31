<?php

error_reporting(0);

$host = "localhost";
$user = "root";
$pass = "";
$db	  = "db_sanchat";

$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
	
	die("Koneksi gagal : " . mysqli_connect_error());
}

?>