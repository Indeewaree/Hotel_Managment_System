<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = ($_POST['password']);
   $gender = ($_POST['gender']);
   $age = ($_POST['age']);
   $address = ($_POST['address']);
   $contact = ($_POST['contact']);
   $cpass = ($_POST['cpassword']);
   $user_type = 'guest';

   $select = " SELECT * FROM users WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         // Note: Using $conn to match your mysqli_real_escape_string above
         $insert = "INSERT INTO users(email, name, password, user_type, gender, age, contact) VALUES('$email','$email','$pass','$user_type','$gender','$age','$contact')";
         if (mysqli_query($conn, $insert)) {
            $last_id = mysqli_insert_id($conn);
            $sql = "INSERT INTO guest(Email, Name, Address, C_No, userId) VALUES('$email','$email','$address', '$contact', '$last_id')";
            if (mysqli_query($conn, $sql)) {
                header('location:login.php');
            } else {
                $error[] = "Error in guest table";
            }
         } else {
            $error[] = "Error in users table";
         }
      }
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Sudu Araliya Hotel</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    :root {
        --primary-gold: #c5a059;
        --glass-bg: rgba(255, 255, 255, 0.1);
        --glass-border: rgba(255, 255, 255, 0.2);
    }

    * {
        margin: 0; padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('LO.png'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 40px 20px;
    }

    .form-container {
        width: 100%;
        max-width: 700px; /* Wider for 2-column layout */
        background: var(--glass-bg);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 25px 45px rgba(0,0,0,0.3);
        color: #fff;
    }

    .logo-img {
        width: 100px;
        margin-bottom: 10px;
    }

    h3 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        margin-bottom: 25px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .error-msg {
        display: block;
        background: rgba(255, 71, 71, 0.2);
        color: #ff9494;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        border: 1px solid rgba(255, 71, 71, 0.3);
    }

    /* Grid Layout for Form Fields */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        text-align: left;
    }

    @media (max-width: 600px) {
        .form-grid { grid-template-columns: 1fr; }
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        font-size: 13px;
        font-weight: 500;
        margin-bottom: 5px;
        color: var(--primary-gold);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    input, select {
        width: 100%;
        padding: 12px 15px;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 8px;
        font-size: 14px;
        color: #333;
        outline: none;
        transition: 0.3s;
    }

    input:focus, select:focus {
        background: #fff;
        box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.4);
    }

    .form-btn {
        width: 100%;
        background: var(--primary-gold);
        color: #fff;
        padding: 14px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 20px;
        letter-spacing: 1px;
    }

    .form-btn:hover {
        background: #a38245;
        transform: translateY(-2px);
    }

    p {
        margin-top: 20px;
        font-size: 14px;
        color: #eee;
    }

    p a {
        color: var(--primary-gold);
        text-decoration: none;
        font-weight: 600;
    }

    .home-link {
        display: inline-block;
        margin-top: 15px;
        padding: 8px 25px;
        border: 1px solid var(--glass-border);
        border-radius: 30px;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        background: rgba(255,255,255,0.05);
        transition: 0.3s;
    }

    .home-link:hover {
        background: rgba(255,255,255,0.2);
    }
  </style>
</head>
<body>

  <div class="form-container">
    <form action="" method="post">
      <img src="LO.png" class="logo-img" alt="Logo">
      <h3>Register Now</h3>

      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>

      <div class="form-grid">
        <!-- Column 1 -->
        <div class="input-group">
            <label>Username (Email)</label>
            <input type="text" name="username" required placeholder="Enter username">
        </div>

        <div class="input-group">
            <label>Contact Number</label>
            <input type="text" name="contact" required placeholder="Enter contact">
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required placeholder="Create password">
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="cpassword" required placeholder="Confirm password">
        </div>

        <div class="input-group">
            <label>Age</label>
            <input type="number" name="age" required placeholder="Enter age">
        </div>

        <div class="input-group">
            <label>Gender</label>
            <select name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <!-- Full width Address field -->
        <div class="input-group" style="grid-column: span 2;">
            <label>Address</label>
            <input type="text" name="address" required placeholder="Enter your full address">
        </div>
      </div>

      <!-- Hidden field kept for logic -->
      <select name="user_type" hidden>
         <option value="guest">guest</option>
      </select>

      <input type="submit" name="submit" value="Register Now" class="form-btn">
      
      <p>Already have an account? <a href="login.php">Login Now</a></p>
      
      <a href="index.php" class="home-link">Return Home</a>
    </form>
  </div>

</body>
</html>