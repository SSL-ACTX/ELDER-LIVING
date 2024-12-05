<?php 
 
 require '../connection/connection.php';

 if($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email_phone = $_POST['email_phone'];
  $password = $_POST['password'];

  $existuser = $collection->findOne(['username' => $username]);
  if($existuser) {
   echo "<script>alert('Username already exist');</script>";
  } else {

    $hashedpass = password_hash($password, PASSWORD_DEFAULT);

    $collection->insertOne([

      'name' => $name,
      'username' => $username,
      'email_phone' => $email_phone,
      'password' => $hashedpass

    ]);
    echo "<script>alert('Registered Successfully');</script>";
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elder Living | Sign Up Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/Signup.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a 
        href="LandingPage.php" 
        class="logo"> 
        Elder Living
      </a>
    </header>
    <div 
      class="navbar-border">
    </div>

    <div class="signup-container">
      <div class="hero-container">
        <img src="../assets/hero.png" alt="" class="hero">
      </div>
      
      <div class="signup-form">
          <h1 class="signup-text">
              SIGN UP
          </h1>
          <p class="signup-instruction">
              Enter your details  below
          </p>

        <form method="POST" action="">
          <div class="signup-input">
                <input type="text" name="name" class="name" placeholder="Enter Name" required>
                <input type="text" name="username" class="username" placeholder="Enter Username" required>
                <input type="text" name="email_phone" class="email" placeholder="Enter Email or Phone Number" required>
                <input type="password" name="password" class="password" placeholder="Enter Password" required>
                <button class="login-button" type="submit" style="cursor: pointer;">Create Account</button>
            </div>
        </form>
        
          <div class="login-container">
            <a href="" class="login-link"> Have an account? <a href="Login.php" class="login"> Login </a> </a> 
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="site-footer">
    <div class="footer-content">
      <div class="footer-section categories">
        <h2 class="section-title">Categories</h2>
        <div class="category-lists">
          <div class="category-group one">
            <a href="#" class="category-item">Adaptive Kitchen Tools</a>
            <a href="#" class="category-item">Bedroom / Bathroom</a>
            <a href="#" class="category-item">Core Products</a>
            <a href="#" class="category-item">Daily Living Aids</a>
            <a href="#" class="category-item">Emergency Medical Alarms</a>
            <a href="#" class="category-item">First-Aid Kits</a>
            <a href="#" class="category-item">Grab Bars and Handrails</a>
            <a href="#" class="category-item">Home Safety and Comfort</a>
            <a href="#" class="category-item">Kitchen Aids</a>
            <a href="#" class="category-item">Lighting Aids</a>
          </div>
          <div class="category-group two">
            <a href="#" class="category-item">Mobility Aids</a>
            <a href="#" class="category-item">Nutritional Supplements</a>
            <a href="#" class="category-item">Orthopaedic Supports</a>
            <a href="#" class="category-item">Personal Care Products</a>
            <a href="#" class="category-item">Reachers and Grabbers</a>
            <a href="#" class="category-item">Shower Chairs and Bath Seats</a>
            <a href="#" class="category-item">Wheelchair Products</a>
            <a href="#" class="category-item">Xerostomia Products</a>
            <a href="#" class="category-item">Zipper Pulls</a>
          </div>
        </div>
      </div>
  
      <div class="footer-section account-info">
        <h2 class="section-title">Account</h2>
        <a href="#" class="account-link">My Account</a>
        <a href="#" class="account-link">Login / Signup</a>
        <a href="#" class="account-link">Your Cart</a>
        <a href="#" class="account-link">Your Order</a>
        <a href="#" class="account-link">Shop</a>
      </div>
  
      <div class="footer-section quick-links">
        <h2 class="section-title">Quick Links</h2>
        <a href="#" class="quick-link-item">FAQ</a>
        <a href="#" class="quick-link-item">Contact</a>
        <a href="#" class="quick-link-item">About Us</a>
        <a href="#" class="quick-link-item">Home</a>
        <a href="#" class="quick-link-item">Articles</a>
      </div>
  
      <div class="footer-section payment-social">
        <h2 class="section-title">Payment Method</h2>
        <img src="../assets/gcash.png" alt="Gcash" class="payment-image">
        <h2 class="section-title">Follow Us</h2>
        <div class="social-icons">
          <img src="../assets/twitter.png" alt="Twitter">
          <img src="../assets/fb.png" alt="Facebook">
          <img src="../assets/insta.png" alt="Instagram">
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <h1 class="footer-copyright">© 2024 <span class="brand-name">Elder Living</span></h1>
    </div>
  </footer>
</body>
</html>