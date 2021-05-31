<?php 

session_start();
require 'koneksi.php';

if (isset($_POST['add'])) {
	
	$memberID = $_POST['memberID'];
	$IdRoom = $_POST['IdRoom'];

	if (trim($memberID) == "") {
		
		echo "<script>alert('Username Must be filled.'); window.location.href = 'room.php?IdRoom=$IdRoom'</script>";
	} else {

		$explode1 = explode(";", $memberID);

		for ($i=0; $i < count($explode1); $i++) { 
		
			$query = mysqli_query($con, "SELECT * FROM room WHERE IdRoom = '$IdRoom' AND memberID LIKE '%$explode1[$i]%'");
			$query2 = mysqli_query($con, "SELECT * FROM user WHERE username = '$explode1[$i]'");
			$data = mysqli_fetch_array($query);

			if (mysqli_num_rows($query2) >= 1) {
				
				if (mysqli_num_rows($query) <= 0) {

					mysqli_query($con, "UPDATE room SET memberID = CONCAT(memberID, ';$explode1[$i]') WHERE IdRoom = '$IdRoom'");
				}
			}

			if (($i + 1) == count($explode1)) {
				
				header("location: room.php?IdRoom=$IdRoom");
			}
		}

		// if ($) {
		// 	# code...
		// }

		// for ($i=0; $i < count($explode2); $i++) { 
			
		// 	for ($x=0; $x < count($explode1); $x++) {

		// 		if ($explode2[$i] == $explode1[$x]) {
					

		// 		} else {

		// 			$query2 = mysqli_query($con, "SELECT * FROM room WHERE IdRoom = '$IdRoom'");
		// 			$data2 = mysqli_fetch_array($query2);
		// 			mysqli_query($con, "UPDATE room SET memberID = '$data2[memberID];$explode1[$x]' WHERE IdRoom = '$IdRoom'");
		// 		}
		// 	}

		// 	if ($i == count($explode2)) {
				
		// 		header("location: room.php?IdRoom=$IdRoom");
		// 	}
		// }
	}
}

?>