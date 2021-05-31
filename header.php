<?php

session_start();

if (!isset($_SESSION['IdUser'])) {
	
	$_SESSION['login_gagal'] = "Silahkan login terlebih dahulu.";
	header("location:login.php");
} else {

	$IdUser = $_SESSION['IdUser'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SanChat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/font-awesome.min.css">
</head>
<body>
	<div class="container"  style="padding-top: 70px;">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		    <a class="navbar-brand" href="index.php">SanChat</a>
		</nav>