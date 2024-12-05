<?php
require '../connection/connection.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$showOtpForm = false;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'penoliarroigabriel@gmail.com';
        $mail->Password   = 'pzoy ntlw rtvd womk'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('penoliarroigabriel@gmail.com', 'Elderly Care Essential Store');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is: <b>$otp</b>";

        $mail->send();
        echo "<script>alert('The OTP has been sent to your email account. Please check it.');</script>";
        $showOtpForm = true; 
    } catch (Exception $e) {
        echo "<script>alert('Failed to send OTP. Try again later.');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    $entered_otp = $_POST['otp'];
    if ($entered_otp == $_SESSION['otp']) {
        echo "<script>alert('Verification Complete'); window.location.href='reset-password.php';</script>";
        header("");
        exit();
    } else {
        echo "<script>alert('Incorrect OTP. Please try again.');</script>";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a href="../html/LandingPage.php" class="logo">Elder Living</a>
    </header>
    <div class="navbar-border"></div>

    <div class="forgot-password">
      <div class="hero-container">
        <img src="../assets/hero.png" alt="" class="hero">
      </div>
      
      <div class="forgot-pass-form">
    <?php if (!$showOtpForm): ?>
        <div class="forgot-password-container">
            <h2>Forgot Password?</h2>
            <p>Just enter the email address linked to your account <br> and we'll send you a code to reset your password.</p>
            
            <form method="post" action="" id="forgot-password-form">
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <div class="forgot-password-btn">
                    <button type="submit" class="submit">Send Code</button>
                    <a href="Login.php" class="back">Back</a>
                </div>
            </form>
            
            <p>If you don't see the email <br> within a few minutes, please try again.</p>
        </div>
    <?php else: ?>
        <div class="forgot-password-container">
            <h2>Enter Verification Code</h2>
            <p>We’ve sent a code to your email address. Enter it below to verify.</p>
            
            <form method="post" action="">
                <input type="text" name="otp" placeholder="Enter your OTP" required>
                <div class="forgot-password-btn">
                    <button type="submit" class="submit">Verify Code</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>
  </main>

  <!-- OTP Modal -->
  <div id="otpModal" class="modal" style="display:none;">
    <div class="modal-content">
      <h2>Enter Verification Code</h2>
      <form method="post" action="">
        <input type="text" name="otp" placeholder="Enter your OTP" required>
        <button type="submit" class="verify-btn">Verify</button>
      </form>
    </div>
  </div>

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

  <script>
    const otpSent = <?php echo isset($otp_sent) && $otp_sent ? 'true' : 'false'; ?>;
    if (otpSent) {
      document.getElementById('otpModal').style.display = 'block';
    }
  </script>
</body>
</html>
