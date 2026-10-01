
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard</h1>

		</div>
		
	</div>

	<ul class="box-info">
		<li>
		<i class='bx bxs-group'></i>
			<span class="text">
			<?php
				require 'dbconfig.php';

				$query = "SELECT id FROM booking WHERE guestId='".$_SESSION['guest_id']."' ORDER BY id;";
				$query_run = mysqli_query($connection, $query);

				$row = mysqli_num_rows($query_run);
				echo '<h3>' . $row . '</h3>';
				?>
				<?php echo $_SESSION["guest_id"] ?>
				<p>Booking</p>
			</span>
		</li>
		
		
	</ul>


	
</main>