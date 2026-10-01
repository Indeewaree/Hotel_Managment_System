<!-- Header Included -->
<?php include('Included/Header.php'); ?>
<!-- Header Included -->

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="margin-left: 50px; margin-top:30px;">
			<img src="img/LO.png" style="width: 180px;" alt="">
			
		</a>
		<ul class="side-menu top">
		<li>
				<a href="Dashboard.php" >
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
			<li class="active">
				<a href="Room.php" style="background-color: white;">
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
		<?php include('RoomBody.php'); ?>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="js/script.js"></script>
</body>

</html>