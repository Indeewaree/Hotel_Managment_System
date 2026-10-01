
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard</h1>

		</div>
		
	</div>

	<ul class="box-info">
		<li>
			<i class='bx bxs-calendar-check'></i>
			<span class="text">
			<?php
				require 'dbconfig.php';

				$query = "SELECT id FROM guest ORDER BY id";
				$query_run = mysqli_query($connection, $query);

				$row = mysqli_num_rows($query_run);
				echo '<h3 style="color: red;">' . $row . '</h3>';
				?>
				<p style="color: red;">Guest</p>
			</span>
		</li>
		
		<li>
		<i class='bx bxs-group'></i>
			<span class="text">
			<?php
				require 'dbconfig.php';

				$query = "SELECT id FROM booking ORDER BY id";
				$query_run = mysqli_query($connection, $query);

				$row = mysqli_num_rows($query_run);
				echo '<h3>' . $row . '</h3>';
				?>
				<p>Booking</p>
			</span>
		</li>
		
		
	</ul>


	
</main>