<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>SanChat - LOG IN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="padding-top: 60px;">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<center>
					<h1>LOG IN - SanChat</h1>
				</center>
				<div class="card">
					<div class="card-body">
						<?php

							if (isset($_SESSION['login_gagal'])) {
								
								$login_gagal = $_SESSION['login_gagal'];
						?>
							<div class="alert alert-danger"><?=$login_gagal?></div>
						<?php
							}

							unset($_SESSION['login_gagal']);
						?>
						<form action="actlogin.php" method="post">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="username" name="username" id="username" class="form-control" placeholder="Your Username" required="" autofocus="">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Your Password" required="">
							</div>
							<div class="form-group">
								<button type="submit" name="btnLogin" class="btn btn-outline-success btn-block">LOG IN</button>
								<div class="text-center">or</div>
								<a href="register.php" class="btn btn-outline-primary btn-block">Register new account</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="bootstrap-4.3.1/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>