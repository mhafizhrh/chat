<?php

require 'koneksi.php';

if (isset($_GET['IdMsg'])) {
	
	$IdMsg = $_GET['IdMsg'];
	$IdRoom = $_GET['IdRoom'];

	$query = mysqli_query($con, "DELETE FROM message WHERE IdMsg = '$IdMsg'");

	if ($query) {
		
		header("location: room.php?IdRoom=$IdRoom");
	} else {

		header("location: room.php?IdRoom=$IdRoom");
	}
}

?>