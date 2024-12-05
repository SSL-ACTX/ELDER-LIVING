<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elder Living | Contact Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/ContactPage.css">
  <link rel="stylesheet" href="../javascript/LandingPage.js">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="nav-header">
      <a href="../html/LandingPage.php" class="logo"> 
        Elder Living
      </a>
      <nav class="navbar">
        <ul>
          <li>
              <a class="nav-link" href="../html/LandingPage.php">
                Home
              </a>
            </li>
            <li>
              <a class="nav-link article" href="../html/ArticlesPage.php">
                Articles
              </a>
            </li>
            <li>
              <a class="nav-link about-us" href="../html/AboutPage.php">
                About
              </a>
            </li>
            <li>
              <a class="nav-link" href="#">
                Contact
              </a>
            </li>
          </li>
          <li class="dropdown" style="display: flex; cursor: pointer;">
            <a class="nav-link" href="/html/user-account/AccountPage.html">Account</a>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="dropdown-icon" style="margin: 0.2rem 0 0 0.5rem;">
                <path d="M14.25 6.375L9 11.625L3.75 6.375" stroke="#313A5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
              <ul class="account-submenu">
                  <li><a href="../html/Login.php">Log In</a></li>
                  <li><a href="../html/Signup.php">Sign up</a></li>
                  <li><a href="../html/ForgotPassword.php">Forgot Password</a></li>
                  <li><a href="../html/user-account/AccountPage.php">My Account</a></li>
                  <li><a href="../html/Login.php">Logout</a></li>
              </ul>
          </li>
        </ul>
      </nav>
    </header>
  </main>
  
  <div class="header">
    <div class="contact-header">
      <h1 class="title">
        Have a question? <br>
        Send us a message
      </h1>
    </div>
  </div>

  <div class="contact-container">
    <div class="contact-form">
      <div class="hero">
        <img src="../assets/contact-image.png" alt="">
      </div>
      <form>
        <h1 class="contact-title">Contact Us</h1>  
        <input type="text" id="name" name="name" placeholder="Enter Your Full Name"> 
        <input type="email" id="email" name="email" placeholder="Your Email">
        <textarea id="message" name="message" placeholder="Enter your message"></textarea>
        <button type="submit" class="submit">Send Message</button>
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
        <a href="/html/user-account/AccountPage.html" class="account-link">My Account</a>
        <a href="/html/Login.html" class="account-link">Login / Signup</a>
        <a href="/html/CartPage.html" class="account-link">Your Cart</a>
        <a href="/html/user-account/PurchasePage.html" class="account-link">Your Order</a>
        <a href="/html/LandingPage.html" class="account-link">Shop</a>
      </div>
  
      <div class="footer-section quick-links">
        <h2 class="section-title">Quick Links</h2>
        <a href="/html/AboutPage.html" class="quick-link-item">FAQ</a>
        <a href="/html/ContactPage.html" class="quick-link-item">Contact</a>
        <a href="/html/AboutPage.html" class="quick-link-item">About Us</a>
        <a href="/html/LandingPage.html" class="quick-link-item">Home</a>
        <a href="/html/ArticlesPage.html" class="quick-link-item">Articles</a>
      </div>
  
      <div class="footer-section payment-social">
        <h2 class="section-title">Payment Method</h2>
        <img src="/assets/paypal.png" alt="Gcash" class="payment-image">
      </div>
    </div>
    
    <div class="footer-bottom">
      <h1 class="footer-copyright">© 2024 <span class="brand-name">Elder Living</span></h1>
    </div>
  </footer>
</body>

<script>

let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const textElements = document.querySelectorAll('.mission_text, .purpose_text, .vision_text');

function updateUnderline() {
  textElements.forEach((text) => {
    text.classList.remove('active');
  });

  if (textElements[currentSlide]) {
    textElements[currentSlide].classList.add('active');
  }
}

function changeSlide(direction) {
  currentSlide += direction;
  if (currentSlide >= slides.length) {
    currentSlide = 0; 
  } else if (currentSlide < 0) {
    currentSlide = slides.length - 1;
  }
  document.querySelector('.slides').style.transform = `translateX(-${currentSlide * 100}%)`;
  updateUnderline();
}
updateUnderline();


const bookmarkFaq = document.querySelectorAll(".FAQ-products");
  const browserFaq = document.querySelectorAll(".FAQ-browser");
  const mobileFaq = document.querySelectorAll(".FAQ-mobile");
  const chromiumFaq = document.querySelectorAll(".FAQ-chromium");
  
  bookmarkFaq.forEach((faq) => {
      faq.addEventListener("click", () => {
          faq.classList.toggle("active");
      });
  });

  browserFaq.forEach((faq) => {
      faq.addEventListener("click", () => {
          faq.classList.toggle("active");
      });
  });

  mobileFaq.forEach((faq) => {
      faq.addEventListener("click", () => {
          faq.classList.toggle("active");
      });
  });

  chromiumFaq.forEach((faq) => {
      faq.addEventListener("click", () => {
          faq.classList.toggle("active");
      });
  });

</script>
</html>