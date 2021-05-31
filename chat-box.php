		
		<?php

				require 'koneksi.php';
				$IdRoom = $_GET['IdRoom'];
				session_start();
				$IdUser = $_SESSION['IdUser'];
				$query2 = mysqli_query($con, "
					SELECT * FROM 
					((message LEFT JOIN room ON message.IdRoom = room.IdRoom) LEFT JOIN user ON message.IdUser = user.IdUser) 
					WHERE message.IdRoom = '$IdRoom' 
					ORDER BY IdMsg DESC
					LIMIT 30
				");

				while ($data2 = mysqli_fetch_array($query2)) {

					if ($data2['IdUser'] == $IdUser) {
						
						$alert = "primary";
						$id = " (You)";
						$delete_btn = "<a href='delete-message.php?IdMsg=$data2[IdMsg]&IdRoom=$IdRoom'><span class='fa fa-trash'></span></a> ";
					} else {

						$alert = "secondary";
						$id = null;
						$delete_btn = null;
					}
		?>

		<div class="alert alert-<?=$alert?>">
			<p class="pull-right"><?=$data2['datetime_send']?></p>
			<h6><b><?php echo $delete_btn; echo $data2['name']; echo $id;?></b></h6>
			<p><?=$data2['message'];?></p>
		</div>

		<?php
				}
		?>