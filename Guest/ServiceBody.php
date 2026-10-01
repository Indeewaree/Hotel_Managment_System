<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hms";

// create connection
$connection = new mysqli($servername, $username, $password, $database);


$Service_Name = "";
$Cost = "";




$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Service_Name = $_POST["Service_Name"];
    $Cost = $_POST["Cost"];

    
   

    do {
        if (empty($Service_Name) || empty($Cost) ) {
            $errorMessage = " All the fields are required";
            break;
        }

        // add new member into database
        $sql = "INSERT INTO services (id, Service_Name, Cost)" . "VALUES ('$Service_Name', '$Cost')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
        // clear the form
        

		$Service_Name = "";
		$Cost = "";
		
      
        

        $successMessage = "Service added Correctly";
        header("location:Service.php");
        exit;

    } while (false);
}
?>
<main>
	<div class="head-title">
		<div class="left">
			<h1>Services</h1>

		</div>
	</div>
	<div class="table-data">
		<div class="order">

		
        <a class="btn info" href="Service_Create.php" role="button"> New Service</a>

			<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th style="font-size: large;">Service ID</th>
						<th style="font-size: large;">Service Name</th>
						<th style="font-size: large;">Cost</th>
					
						
					
						


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
					$sql = "SELECT * FROM services";
					$result = $connection->query($sql);

					if (!$result) {
						die("Invalid query:" . $connection->error);
					}

					// Read data of each rows
					while ($row = $result->fetch_assoc()) {
						echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[Service_Name]</td>
                    <td>$row[Cost]</td>
                  
				
			
					
                    <td >
                        <a class='btn warning btn-sm' href='Service_Edit.php?id=$row[id]'>Edit</a>

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