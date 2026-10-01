<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hms";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$Service_Name = "";
$Cost = "";






$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //** Check if the id is valid or not

    if (!isset($_GET["id"])) {
        header("location:Service.php");
        exit;
    }

    $id = $_GET["id"];
    // read the row of the selected member from database table
    $sql = "SELECT * FROM services WHERE id =$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:Service.php");
        exit;
    }
    $Service_Name = $row["Service_Name"];
    $Cost = $row["Cost"];
   

   
    
} else {
    // Post method: Update the data of the Member
    $id  = $_POST["id"];
    $Service_Name = $_POST["Service_Name"];
    $Cost = $_POST["Cost"];
  
   
   


    

    do {
        if (empty($id ) || empty($Service_Name) || empty($Cost) ) {
            $errorMessage = "All the fields are required";
            break;
        }
        $sql = "UPDATE services " .
            "SET Service_Name = '$Service_Name', Cost = '$Cost'" .
            "WHERE id  = $id ";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
        $successMessage = "Room updated correctly";

        header("location:Service.php");
        exit;
    } while (true);
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
        <h2>Update Guest</h2>
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

<form method="post">
            <input type="hidden" name="id" value="<?php echo $id ; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Service Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Service_Name" value="<?php echo $Service_Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cost</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Cost" value="<?php echo $Cost; ?>">
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
                    <button type="submit" class="btn btn-outline-primary" >Update</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href="Service.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>