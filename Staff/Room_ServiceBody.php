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
			<h1>Room Service</h1>

		</div>
	</div>
	<div class="table-data">
		<div class="order">

		
        <a class="btn info" href="Room_Service_Create.php" role="button"> New Room Service</a>

			<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th style="font-size: large;">Room Service ID</th>
						<th style="font-size: large;">Room No</th>
						<th style="font-size: large;">Service ID</th>
						
					
						


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
					$sql = "SELECT * FROM room_service";
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
                    <td>$row[Service_ID]</td>
                   
				
			
					
                    <td >
                        <a class='btn warning btn-sm' href='Room_Service_Edit.php?id=$row[id]'>Edit</a>
                  
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