<?php

session_start();
date_default_timezone_set("Asia/Jakarta");
require 'koneksi.php';

$IdUser = $_SESSION['IdUser'];

if (isset($_POST['message']) && isset($_POST['IdRoom'])) {
	
	$message = nl2br(strip_tags($_POST['message']));
	$IdRoom = $_POST['IdRoom'];

	if (trim($message) == "" || $_POST['IdRoom'] == 0) {
		
		echo "<script>alert('Message must be filled.')</script>";
	} else {

		$datetime_send = date("d/m/Y H:i:s");
		mysqli_query($con, "INSERT INTO message (IdRoom, IdUser, message, datetime_send) VALUES ('$IdRoom', '$IdUser', '$message', '$datetime_send')");
	}
}

?>