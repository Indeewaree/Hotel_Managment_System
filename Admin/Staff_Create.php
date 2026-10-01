<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(name, contact, age, gender, email, password, user_type) VALUES('$name','$contact','$age','$gender','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:Staff.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/message.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body >
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
<div class="container my-5" >
        <h2>New Staff</h2>

<form action="" method="post"><br><br>
<div class="row mb-3">
    <div class="message">
    <?php
                 if(isset($error)){
                    foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                     };
                 };
            ?><br>
    </div>
           
   
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Full Name</label>
            <div class="col-sm-6" >
                <input type="text" name="name" class="form-control" required >
            </div>
    </div>
  
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Contact No</label>
            <div class="col-sm-6">
                <input type="contact" name="contact" class="form-control" required >
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Age</label>
            <div class="col-sm-6" >
                <input type="aget" name="age" class="form-control" required >
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-6">
            <select name="gender" class="form-control" required>
                <option value="" >-------------------- SELECT -------------------</option>
                <option value="male">male</option>
                <option value="female">female</option>
      
            </select>
            </div>
    </div>
   
   <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email Address</label>
            <div class="col-sm-6" >
            <input type="email" name="email" class="form-control" required >
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-6">
            <input type="password" name="password" class="form-control" required >
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Confirm Password</label>
            <div class="col-sm-6" >
            <input type="password" name="cpassword" class="form-control" required >
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">User Type</label>
            <div class="col-sm-6" >
            <select name="user_type" class="form-control" required>
                <option value="" >-------------------- SELECT -------------------</option>
                <option value="staff">Staff</option>
               
            </select>
            </div>
    </div>
    <div class="row mb-3" style="margin-left: 50px;">
                <div class="offset-sm-3 col-sm-3 d-grid">
                <input type="submit" name="submit" value="Register now" class="btn btn-outline-primary">
                </div>
                <div class="col-sm-3 d-grid"  style="height: 5px; ">
                    <a class="btn btn-outline-danger" href="Staff.php" role="button">Cancel</a>
                </div>
            </div>
   
</form>

</div>

</body>

</html>