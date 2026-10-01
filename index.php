<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome To Sudu Aralia Hotel</title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <link rel="icon" href="logo.jpg">

  <style>
    :root {
      --primary-gold: #c5a059;
      --dark-bg: #1a1a1a;
      --glass: rgba(255, 255, 255, 0.1);
    }

    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
      background-color: var(--dark-bg);
      color: #fff;
    }

    /* Background Image & Overlay */
    .body-home {
      background: url('images.png') no-repeat center center fixed; /* Keep your image name */
      background-size: cover;
    }

    .black-fill {
      background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.9));
      min-height: 100vh;
      padding-bottom: 50px;
    }

    /* Navbar Styling */
    .navbar {
      background: rgba(255, 255, 255, 0.95) !important;
      border-radius: 50px;
      margin-top: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      padding: 10px 25px;
    }

    .nav-link {
      color: #333 !important;
      font-weight: 600;
      transition: 0.3s;
    }

    .nav-link:hover {
      color: var(--primary-gold) !important;
    }

    /* Hero Section */
    .welcome-text {
      height: 70vh;
      text-align: center;
    }

    .welcome-text h4 {
      font-family: 'Playfair Display', serif;
      font-size: 4rem;
      margin-bottom: 20px;
      color: var(--primary-gold);
      text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
    }

    .welcome-text p {
      max-width: 600px;
      font-size: 1.1rem;
      font-weight: 300;
      letter-spacing: 1px;
    }

    /* Cards & Sections */
    section {
      padding: 100px 0;
    }

    .card-1 {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: white;
      border-radius: 20px;
      overflow: hidden;
      transition: transform 0.4s ease;
    }

    .card-1:hover {
      transform: translateY(-10px);
    }

    .card-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      color: var(--primary-gold);
    }

    /* Contact Form Styling */
    #contact form {
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      color: #333;
      width: 100%;
      max-width: 600px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.4);
    }

    #contact h3 {
      font-family: 'Playfair Display', serif;
      margin-bottom: 30px;
      text-align: center;
      color: var(--dark-bg);
    }

    .form-control {
      border: 1px solid #ddd;
      padding: 12px;
      border-radius: 8px;
    }

    .btn-primary {
      background-color: var(--primary-gold);
      border: none;
      width: 100%;
      padding: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background-color: #a38245;
      transform: scale(1.02);
    }

    footer {
      padding: 40px 0;
      font-size: 0.9rem;
      opacity: 0.7;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .welcome-text h4 { font-size: 2.5rem; }
    }
  </style>
</head>
<body class="body-home">
    <div class="black-fill">
      <div class="container">
        
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-light" id="homeNav">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="images.png" width="40" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
              </ul>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register_form.php">Register</a></li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- Hero Section -->
        <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
          <h4>Welcome To Sudu Aralia Hotel</h4>
          <p>Located on the quaint banks of the Parakrama Reservoir and surrounded by surreal vistas, Hotel Sudu Araliya invites you to experience luxury in the heart of nature.</p>
        </section>

        <!-- About Section -->
        <section id="about" class="d-flex justify-content-center align-items-center flex-column">
          <div class="card mb-3 card-1">
            <div class="row g-0 align-items-center">
              <div class="col-md-5">
                <img src="thumb-816x460-fd7762b433538183a7e744875b9508ff.jpg" class="img-fluid rounded-start" alt="About Image">
              </div>
              <div class="col-md-7">
                <div class="card-body p-5">
                  <h5 class="card-title">About Us</h5>
                  <p class="card-text">Welcome to Sudu Araliya Hotel Management System, where we strive to provide exceptional service and comfortable accommodations for our guests. Our system is designed to make your stay with us as smooth and enjoyable as possible.</p>
                  <p class="card-text"><small class="text-warning">Premium Experience Since 2022</small></p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="d-flex justify-content-center align-items-center flex-column">
          <form>
            <h3>Get In Touch</h3>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" placeholder="example@mail.com">
              <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" placeholder="Your Full Name">
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="4" placeholder="How can we help you?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
          </form>
        </section>

        <!-- Footer -->
        <footer class="text-center text-light">
          Copyright &copy; 2022 Sudu Araliya. All rights reserved.
        </footer>

      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>