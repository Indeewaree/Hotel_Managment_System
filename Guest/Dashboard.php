<!-- Header Included -->
<?php include('Included/Header.php'); ?>
<!-- Header Included -->

<?php
$sql = "SELECT * FROM guest WHERE userId='" . $_SESSION['user_id'] ."'";

         $conn = mysqli_connect('localhost','root','','hms');

         $result = mysqli_query($conn, $sql);

		 if ($result === false) {
			echo "Error: " . mysqli_error($connection);
		 } else {
			$row = mysqli_fetch_assoc($result);

            $_SESSION['guest_id'] = $row['id'];
		 }
            
?>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="margin-left: 50px; margin-top:30px;">
			<img src="img/LO.png" style="width: 180px;" alt="">
			
		</a>
		<ul class="side-menu top">

			<li class="active">
				<a href="Dashboard.php"  style="background-color: white;">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
		
			<li>
				<a href="Guest.php">
					<i class='bx bxs-user'></i>
					<span class="text">My Info</span>
				</a>
			</li>
			<li>
				<a href="Room.php">
					<i class='bx bxs-calendar'></i>
					<span class="text">Rooms</span>
				</a>
			</li>

			<li>
				<a href="Booking.php">
					<i class='bx bxs-food-menu'></i>
					<span class="text">Booking</span>
				</a>
			</li>
			
			
			<br><br>
			<li>
				<a href="logout.php">
					<i class='bx bxs-exit'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
		
		
	</section>
	<!-- SIDEBAR -->
	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<!-- nav Container included -->
		<?php include 'Included/navContainer.php'; ?>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<?php include('DashboardBody.php'); ?>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="js/script.js"></script>
</body>

</html>