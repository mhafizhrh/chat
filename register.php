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
					<h1>REGISTER - SanChat</h1>
				</center>
				<div class="card">
					<div class="card-body">
						<?php

							$name = "";
							$email = "";
							$tlp = "";

							if (isset($_SESSION['register_gagal'])) {
								
								$register_gagal = $_SESSION['register_gagal'];
								$name = $_SESSION['name'];
								$email = $_SESSION['email'];
								$tlp = $_SESSION['tlp'];
								
								echo "<div class='alert alert-danger'>$register_gagal</div>";

							} else if (isset($_SESSION['register_berhasil'])) {

								$register_berhasil = $_SESSION['register_berhasil'];

								echo "<div class='alert alert-success'>$register_berhasil</div>";
							}
						?>
						<form action="actregister.php" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Your Name" value="<?=$name?>" required="" autofocus="">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Your@email.com" value="<?=$email?>" required="" autofocus="">
							</div>
							<div class="form-group">
								<label>Telephon Number</label>
								<input type="text" name="tlp" class="form-control" placeholder="081234567890" value="<?=$tlp?>" required="" autofocus="">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="username" name="username" class="form-control" placeholder="Your Username" required="" autofocus="">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="Your Password" required="">
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="password2" class="form-control" placeholder="Confirm Password" required="">
							</div>
							<div class="form-group">
								<button type="submit" name="btnRegister" class="btn btn-outline-success btn-block">REGISTER</button>
								<div class="text-center">or</div>
								<a href="login.php" class="btn btn-outline-primary btn-block">LOG IN</a>
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
<?php

unset($_SESSION['register_gagal']);

?>