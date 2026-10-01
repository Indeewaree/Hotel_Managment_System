<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hms";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

$Reservation_ID = "";
$Room_No = "";

$Check_In_Date = "";
$Check_Out_Date = "";




$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Reservation_ID = $_POST["Reservation_ID"];
    $Room_No = $_POST["Room_No"];

    $Check_In_Date =$_POST["Check_In_Date"];
    $Check_Out_Date = $_POST["Check_Out_Date"];

  
    
   
    do {
        if (empty($Reservation_ID) || empty($Room_No) || empty($Reservation_ID ) || empty($Check_Out_Date )  ) {
            $errorMessage = " All the fields are required";
            break;
        }


        // add new member into database
        $sql = "INSERT INTO booking (Reservation_ID ,Room_No, Check_In_Date, Check_Out_Date)" . "VALUES ('$Reservation_ID','$Room_No', '$Check_In_Date','$Check_Out_Date')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
        // clear the form
        

        
$Reservation_ID = "";
$Room_No = "";

$Check_In_Date = "";
$Check_Out_Date = "";
        
      
        

        $successMessage = "Booking added Correctly";
        header("location:Booking.php");
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
        <h2>Booking</h2>
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
                <label class="col-sm-3 col-form-label">Reservation ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Reservation_ID" value="<?php echo $Reservation_ID; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Room No</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Room_No" value="<?php echo $Room_No; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Check In Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Check_In_Date" value="<?php echo $Check_In_Date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Check Out Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Check_Out_Date" value="<?php echo $Check_Out_Date; ?>">
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
                    <button type="submit" class="btn btn-outline-primary">Book Now</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href="Booking.php" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>

</body>

</html>