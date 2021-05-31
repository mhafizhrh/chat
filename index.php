<?php require 'header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<center>
			<a href="logout.php" class="btn btn-outline-danger btn-block"><span class="fa fa-sign-out"></span> Log Out</a>
		</center>
		<br>
		<div class="card">
			<div class="card-header text-center"><h3>ROOM LIST</h3></div>
			<div class="card-body text-center">
				<ul style="list-style-type: none;" class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success"><a href="create-room.php" style="color: black;"><span class="fa fa-plus"></span> New Room</a></li>
					<?php

					require 'koneksi.php';
					session_start();

					$q_profil = mysqli_query($con, "SELECT username FROM user WHERE IdUser = '".$_SESSION['IdUser']."'");
					$data = mysqli_fetch_array($q_profil);
					$username = $data['username'];

					$query = mysqli_query($con, "SELECT * FROM room WHERE memberID LIKE '%$username%' GROUP BY IdRoom ORDER BY IdRoom DESC LIMIT 10");
					$d_room = mysqli_fetch_array($query);
					print_r($d_room);
					for ($i = 0; $i < mysqli_num_rows($query); $i++) { 
						
						echo $d_room['IdRoom'];
					}

					while ($data = mysqli_fetch_array($query)) {
						
					?>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<a href="room.php?IdRoom=<?=$data['IdRoom']?>"><?=$data['roomName']?></a>
						<span class="badge badge-primary badge-pill"><?=count(explode(";", $data['memberID']))?></span>
					</li>
					<?php
					
					}

					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>