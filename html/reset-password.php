<?php
require '../connection/connection.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

   
    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            $updateResult = $collection->updateOne(
                ['email_phone' => $email],
                ['$set' => ['password' => $hashed_password]]
            );

            if ($updateResult->getModifiedCount() > 0) {
                echo "<script>alert('Password successfully updated!'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Failed to update password. Please try again.'); window.location.href = 'forgot_password.php';</script>";
            }
        } else {
            echo "<script>alert('Session expired or email not found.');</script>";
        }
    } else {
         echo "<script>alert('Passwords do not match.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elder Living | Forgot Password Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/ForgotPassword.css">
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

    <div class="forgot-password">
      <div class="hero-container">
        <img src="../assets/hero.png" alt="" class="hero">
      </div>
      
      <div class="forgot-pass-form">
        <div class="forgot-password-container">
          <h2>Reset Password</h2>
          
          <form method="post" action = "" id="forgot-password-form">
            <input type="password" name="new_password" required placeholder="New Password">
            <input type="password" name="confirm_password" required placeholder="Confirm Password"><br><br>
            <div class="forgot-password-btn">
              <button type="submit" class="submit">Reset Password</button>
              <a href="Login.php" class="back">Back</a>
            </div>
          </form>
          
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
  <!-- OTP Verification Modal -->
<div id="otpModal" style="display:none;">
    <div style="background-color:#fff; padding:20px; width:300px; margin:0 auto; border-radius:8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h3>Enter OTP</h3>
        <input type="text" id="otpInput" placeholder="Enter OTP">
        <button onclick="verifyOTP()">Verify OTP</button>
        <div id="otpError" style="color:red; display:none;">Incorrect OTP. Please try again.</div>
    </div>
</div>



</body>
</html>