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
        $sql = "INSERT INTO room (Room_No, Room_Type, Reservation_ID, Status)" . "VALUES ('$Room_No', '$Room_Type', '$Reservation_ID', '$Status')";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<style>
        body {
            background-image: url('room.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;
        }

   
        .container {
           width: 800px;
            
            background-color: wheat;
            padding: 30px;
            border-radius: 10px;
            
        }
        .container h1 {
            text-align: center;
        }
  
        label {
            margin-bottom: 5px;
            margin-left: 70px;
      

        }
        input {
            padding: 10px;
            margin-bottom: 20px;
            
        }
       
  
      
    </style> 
    <div class="container my-5">
        <h2>New Room</h2>
<br>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

<div class="card-body">

</div>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Room No</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Room_No" value="<?php echo $Room_No; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Room Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Room_Type" value="<?php echo $Room_Type; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Reservation ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Reservation_ID" value="<?php echo $Reservation_ID; ?>"></input>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Status" value="<?php echo $Status; ?>">
                </div>
            </div>
            
            
            
            

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>  
                        <strong>$successMessage</strong>            
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                     </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3" style="margin-left: 80px;">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-outline-primary">Register Guest</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href="Room.php" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>

</body>

</html>