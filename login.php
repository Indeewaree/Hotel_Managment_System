<?php
@include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);

   $select = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         header('location:Admin/Dashboard.php');
      } else if ($row['user_type'] == 'staff') {
         $_SESSION['staff_name'] = $row['name'];
         header('location:Staff/Dashboard.php');
      } else if ($row['user_type'] == 'guest') {
         $_SESSION['staff_name'] = $row['name'];
         $_SESSION['user_id'] = $row['id'];
         header('location:Guest/Dashboard.php');
      }
   } else {
      $error[] = 'Incorrect username or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Sudu Araliya Hotel</title>

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
        /* Replace 'background.jpg' with your actual pool image path if needed */
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('LO.png'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    .form-container {
        width: 100%;
        max-width: 450px;
        background: var(--glass-bg);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 25px 45px rgba(0,0,0,0.2);
        color: #fff;
    }

    .logo-img {
        width: 120px;
        margin-bottom: 10px;
        filter: drop-shadow(0 0 10px rgba(0,0,0,0.5));
    }

    h3 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        margin-bottom: 30px;
        color: #fff;
        letter-spacing: 2px;
    }

    .error-msg {
        display: block;
        background: rgba(255, 71, 71, 0.2);
        color: #ff9494;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 14px;
        border: 1px solid rgba(255, 71, 71, 0.3);
    }

    .input-group {
        text-align: left;
        margin-bottom: 20px;
    }

    .input-group label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
        color: var(--primary-gold);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    input[type="text"], 
    input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 8px;
        font-size: 15px;
        color: #333;
        outline: none;
        transition: 0.3s;
    }

    input:focus {
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
        margin-top: 10px;
        letter-spacing: 1px;
    }

    .form-btn:hover {
        background: #a38245;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    p {
        margin-top: 25px;
        font-size: 14px;
        color: #eee;
    }

    p a {
        color: var(--primary-gold);
        text-decoration: none;
        font-weight: 600;
    }

    p a:hover {
        text-decoration: underline;
    }

    .home-link {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 25px;
        border: 1px solid var(--glass-border);
        border-radius: 30px;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        transition: 0.3s;
        background: rgba(255,255,255,0.05);
    }

    .home-link:hover {
        background: rgba(255,255,255,0.2);
        border-color: #fff;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <form action="" method="post">
      
      <img src="LO.png" class="logo-img" alt="Logo">
      
      <h3>LOGIN</h3>

      <?php
      if (isset($error)) {
         foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
         }
      }
      ?>

      <div class="input-group">
        <label>Email Address</label>
        <input type="text" name="email" required placeholder="Enter your email">
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" required placeholder="Enter your password">
      </div>

      <input type="submit" name="submit" value="Login Now" class="form-btn">
      
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>

      <a href="index.php" class="home-link">Return Home</a>

   </form>
  </div>

</body>
</html>