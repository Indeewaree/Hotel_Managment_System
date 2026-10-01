<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hms";

// create connection
$connection = new mysqli($servername, $username, $password, $database);


$Room_No = "";
$Service_ID = "";





$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Room_No = $_POST["Room_No"];
    $Service_ID = $_POST["Service_ID"];
  
  
    
   

    do {
        if (empty($Room_No) || empty($Service_ID)  ) {
            $errorMessage = " All the fields are required";
            break;
        }

        // add new member into database
        $sql = "INSERT INTO room_service (id, Room_No, Service_ID)" . "VALUES ('$id', '$Room_No', '$Service_ID')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
        // clear the form
        

		$Room_No = "";
		$Service_ID = "";
      
        

        $successMessage = "Room Service added Correctly";
        header("location:Room_Service.php");
        exit;

    } while (false);
}
?>
<main>
	<div class="head-title">
		<div class="left">
			<h1>Booking</h1>

		</div>
	</div>
	<div class="table-data">
		<div class="order">

		
        <a class="btn info" href="Booking_Create.php" role="button"> New Booking</a>

			<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th style="font-size: large;">Booking ID</th>
						<th style="font-size: large;">Reservation ID</th>
						<th style="font-size: large;">Room No</th>
						<th style="font-size: large;">Check In</th>
						<th style="font-size: large;">Check Out</th>
						
					
						


					</tr>
				</thead>
				<tbody>
					<!-- Database connect php code  -->
					<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$database = "hms";

					// create connection
					$connection = new mysqli($servername, $username, $password, $database);

					//Check connection
					if ($connection->connect_error) {
						die("Connection Failed:" . $connection->connect_error);
					}

					// aread all data member Table
					$sql = "SELECT * FROM booking";
					$result = $connection->query($sql);

					if (!$result) {
						die("Invalid query:" . $connection->error);
					}

					// Read data of each rows
					while ($row = $result->fetch_assoc()) {
						echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[Reservation_ID]</td>
                    <td>$row[Room_No]</td>
					<td>$row[Check_In_Date]</td>
					<td>$row[Check_In_Date]</td>

                   
				
			
					
                    <td >
                        <a class='btn warning btn-sm' href='Booking_Edit.php?id=$row[id]'>Edit</a>
                        <a class='btn danger btn-sm' href='Booking_Delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
					}
					?>

				</tbody>

			</table>
		</div>

	</div>
<!-- Popup -->


</main>

</script>