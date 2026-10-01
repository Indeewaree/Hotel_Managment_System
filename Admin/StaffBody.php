<style>
* {
  box-sizing: border-box;
}

#myInput {
  
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 50%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


</style>


<main>
	<div class="head-title">
		<div class="left">
			<h1>Staff</h1>

		</div>
		<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
		<a class="btn-download">
			<i class='bx bxs-group'></i>
			<?php
				require 'dbconfig.php';

				$query = "SELECT id FROM users ORDER BY id";
				$query_run = mysqli_query($connection, $query);

				$row = mysqli_num_rows($query_run);
				echo '<h3 >' . $row . '</h3>';
				?>

				
			<p>Number of Staff</p>
		</a>
	</div>
	<div class="table-data">
		<div class="order">

			<a class="btn info" href="Staff_Create.php" role="button"> Register Staff</a>
			<br><br>
			
			<table class="table">
				<thead>
					<tr>
						<th style="font-size: large;">Emp No</th>
						<th style="font-size: large;">Name</th>
						<th style="font-size: large;">Contact</th>
						<th  style="font-size: large;">Age</th>
						<th  style="font-size: large;">Gender</th>
						<th style="font-size: large;">Email</th>
				
						
						
    
						

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
					$sql = "SELECT * FROM users WHERE user_type = 'staff'";
					$result = $connection->query($sql);

					if (!$result) {
						die("Invalid query:" . $connection->error);
					}

					// Read data of each rows
					while ($row = $result->fetch_assoc()) {
						echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[contact]</td>
					<td>$row[age]</td>
					<td>$row[gender]</td>
					<td>$row[email]</td>
			
                    <td >
                        <a class='btn warning btn-sm' href='Staff_Edit.php?id=$row[id]'>Edit</a>
                        <a class='btn danger btn-sm' href='Staff_Delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
					}
					?>

				</tbody>

			</table>
			


		</div>

	</div>


</main>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table-data");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            var found = false;
            td = tr[i].getElementsByTagName("td");
            for (j = 1; j < td.length - 1; j++) { // Starting from index 1 to skip the first column (Emp No) and last column (actions)
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break; // Exit the inner loop if the text is found in any column
                    }
                }       
            }
            if (found) {
                tr[i].style.display = ""; // Show the row if text is found in any column
            } else {
                tr[i].style.display = "none"; // Otherwise, hide the row
            }
        }
    }
</script>