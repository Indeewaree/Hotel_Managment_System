<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hms";

// create connection
$connection = new mysqli($servername, $username, $password, $database);


$Name = "";
$Email = "";
$Address = "";
$C_No = "";




$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Address = $_POST["Address"];
    $C_No = $_POST["C_No"];
  
    
   

    do {
        if (empty($Name) || empty($Email) || empty($Address) || empty($C_No) ) {
            $errorMessage = " All the fields are required";
            break;
        }

        // add new member into database
        $sql = "INSERT INTO guest (Name, Email, Address, C_No)" . "VALUES ('$Name', '$Email', '$Address', '$C_No')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
        // clear the form
        
		$Name = "";
		$Email = "";
		$Address = "";
		$C_No = "";
		
      
        

        $successMessage = "Guest added Correctly";
        header("location:Guest.php");
        exit;

    } while (false);
}
?>
<main>
	<div class="head-title">
		<div class="left">
			<h1>Guest</h1>

		</div>
	</div>
	<div class="table-data">
		<div class="order">

		
			<table class="table">
				<thead>
					<tr>
						<th style="font-size: large;">ID</th>
						<th style="font-size: large;">Name</th>
						<th style="font-size: large;">Email</th>
						<th style="font-size: large;">Address</th>
						<th style="font-size: large;">Contact No</th>
						
					
						


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
					$sql = "SELECT * FROM guest WHERE userId = " . $_SESSION['user_id'] . ";";
					$result = $connection->query($sql);

					if (!$result) {
						die("Invalid query:" . $connection->error);
					}

					// Read data of each rows
					while ($row = $result->fetch_assoc()) {
						echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[Name]</td>
                    <td>$row[Email]</td>
                    <td>$row[Address]</td>
					<td>$row[C_No]</td>
				
			
					
                    <td >
                        <a class='btn warning btn-sm' href='Guest_Edit.php?id=$row[id]'>Edit</a>

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