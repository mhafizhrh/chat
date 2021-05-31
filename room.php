<?php require 'header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<center>
			<a href="index.php" class="btn btn-outline-dark btn-block"><span class="fa fa-angle-left"></span> Back to Home</a>
		</center>
		<br>
		<?php

		require 'koneksi.php';

		if (isset($_GET['IdRoom'])) {
			
			$IdRoom = $_GET['IdRoom'];

			$query = mysqli_query($con, "SELECT * FROM user WHERE IdUser = '$IdUser'");
			$query2 = mysqli_query($con, "SELECT * FROM room WHERE IdRoom = '$IdRoom' AND memberID LIKE '%$data[username]%'");
			$data = mysqli_fetch_array($query);
			$data2 = mysqli_fetch_array($query2);

			$memberID = explode(";", $data2['memberID']);

			for ($i = 0; $i < count($memberID); $i++) {

				if ($memberID[$i] == $data['username']) {

		?>

		<form method="post" action="add-member.php">
			<div class="form-group">
				<label>Add your Friend to the Room :</label>
				<input type="text" name="memberID" class="form-control" placeholder="@Username">
				<input value="<?=$_GET['IdRoom']?>" name="IdRoom" hidden>
				<label style="color: red">* Separate with semicolon to add more friend to the Room. Ex : friend1;older_sister;mom</label>
			</div>
			<div class="form-group">
				<button class="btn btn-outline-success btn-block" name="add"><span class="fa fa-plus"></span> Add</button>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header text-center"><b><?=$data['roomName']?></b></div>
			<div class="card-body">
				<div class="d-flex flex-column-reverse" style="min-height: 450px; max-height: 450px; overflow-y: auto;" id="chatBox">

				</div>
				<div class="input-group" id="inputMsg">
					<textarea class="form-control" id="message" rows="2" placeholder="Type here...."></textarea>
					<div class="input-group-append">
						<button type="submit" id="send" class="btn btn-outline-primary"><span class="fa fa-send"></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<div class="card-header text-center"><b>MEMBER LIST</b></div>
			<div class="card-body">
				<div class="d-flex flex-column" style="min-height: 450px; max-height: 450px; overflow-y: auto;" id="memberList">
					<ul class="list-group">
						<?php

						$explode = explode(";", $data2['memberID']);
						for ($i = 0; $i < count($explode); $i++) {

							echo "<li class='list-group-item d-flex justify-content-between align-items-center'><span class='fa fa-user'></span> $explode[$i]</li>";
						}

						?>
					</ul>
				</div>
			</div>
		</div>
	</div>

		<?php
					break;

				} else {

					if (($i + 1) >= count($memberID)) {

						echo "<center><h3>Room not found.</h3></center>";
						break;
					}
				}
			}
		} else {

			header("location: index.php");
		}

		?>
</div>
<script src="jquery-3.4.1.js"></script>
<script>
	$(document).ready(function() {

		setInterval(function() {
		$.ajax({
			url: "chat-box.php",
			data: {IdRoom: <?php echo $_GET['IdRoom'] ?>},
			type: "GET",
			dataType: "html",
			success: function(result) {

				$("#chatBox").html(result);
			}
		});
		}, 300);

		$("#send").click(function() {
			var message = $("#message").val();
			var IdRoom = $("#IdRoom").val();
			$.ajax({
				url: "send-message.php",
				data: {message: message, IdRoom: <?php echo $_GET['IdRoom'] ?>},
				type: "POST",
				dataType: "html",
				beforeSend: function() {

					$("#send").attr("disabled", "true");
					$("#send").html("<span class='fa fa-spinner fa-spin'></span>");
				},
				success: function(result) {

					$("#send").removeAttr("disabled");
					$("#send").html("<span class='fa fa-send'></span>");
					$("#message").val("").empty();
				},
				error: function() {

					alert("Error");
					$("#message").val("").empty();
				}
			});
		});
	});
</script>
<?php require 'footer.php'; ?>