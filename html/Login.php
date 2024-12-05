<?php 

require '../connection/connection.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $input = $_POST['input'];
  $password = $_POST['password'];

  if(filter_var($input, FILTER_VALIDATE_EMAIL)){
    $user = $collection->findOne(['email_phone' => $input]);
  } else {
    $user = $collection->findOne(['username' => $input]);
  }

  if($user && password_verify($password, $user['password'])){
    
    $_SESSION['username'] = $user['username'];
    $_SESSION['email_phone'] = $user['email_phone'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['gender'] = $user['gender'];
    $_SESSION['dob'] = $user['dob'];
    
    // echo "<script>alert('Log in successfully'); window.location.href = 'LandingPage.php';</script>";
    echo "<script>window.location.href = 'LandingPage.php';</script>"; //save time lang, remove nyo nalang to
    exit();
  } else {
     echo "<script>alert('Invalid username and password'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elder Living | Login Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/Login.css">
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

    <div class="login-container">
      <div class="hero-container">
        <img src="../assets/hero.png" alt="" class="hero">
      </div>
      
      <div class="login-form">
        <h1 class="login">
          LOGIN
        </h1>
        <p class="login-instruction">
          Enter your details  below
        </p>
        <form method = "post" action="">
        <input 
            type="text" 
            class="email" 
            name = "input"
            required
            placeholder="Enter Email or Username"
          >
        <input 
          type="password" 
          class="password" 
          required
          name = "password"
          placeholder="Enter Password">
          <button type="submit" class="login-button">LOGIN</button>
        </form>
        
        <a href="../html/ForgotPassword.php" 
          class="forgot-password">
          Forgot Password?
        </a>
        <div class="signup-container">
          <a href="" class="signup-link">Don't have an account?<a href="Signup.php" class="signup">Sign up</a>
          </a> 
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
