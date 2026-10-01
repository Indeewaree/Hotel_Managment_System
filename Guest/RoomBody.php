<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hms";

// create connection
$connection = new mysqli($servername, $username, $password, $database);


$Room_No = "";
$Room_Type = "";
$Reservation_ID = "";
$Status = "";




$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Room_No = $_POST["Room_No"];
    $Room_Type = $_POST["Room_Type"];
    $Reservation_ID = $_POST["Reservation_ID"];
    $Status = $_POST["Status"];
  
    
   

    do {
        if (empty($Room_No) || empty($Room_Type) || empty($Reservation_ID) || empty($Status) ) {
            $errorMessage = " All the fields are required";
            break;
        }

        // add new member into database
        $sql = "INSERT INTO room ( Room_Type, Reservation_ID, Status)" . "VALUES ('$Room_No', '$Room_Type', '$Reservation_ID', '$Status')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
        // clear the form
        

		$Room_No = "";
		$Room_Type = "";
		$Reservation_ID = "";
		$Status = "";
      
        

        $successMessage = "Room added Correctly";
        header("location:Room.php");
        exit;

    } while (false);
}
?>
<main>
	<div class="head-title">
		<div class="left">
			<h1>Room</h1>

		</div>
	</div>
	<div class="table-data">
		<div class="order">

		
        <!-- <a class="btn info" href="Room_Create.php" role="button"> New Room</a> -->

			<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th style="font-size: large;">Room ID</th>
						<th style="font-size: large;">Room No</th>
						<th style="font-size: large;">Room Type</th>
						<th style="font-size: large;">Reservation ID</th>
						<th style="font-size: large;">Status</th>
						
					
						


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
					$sql = "SELECT * FROM room WHERE status ='Stayover'";
					$result = $connection->query($sql);

					if (!$result) {
						die("Invalid query:" . $connection->error);
					}

					// Read data of each rows
					while ($row = $result->fetch_assoc()) {
						echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[Room_No]</td>
                    <td>$row[Room_Type]</td>
                    <td>$row[Reservation_ID]</td>
					<td>$row[Status]</td>
				
			
					
                   
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