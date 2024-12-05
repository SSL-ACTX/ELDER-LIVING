<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elder Living | About Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/AboutPage.css">
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
            <a class="nav-link about-us" href="#">
              About
            </a>
          </li>
          <li>
            <a class="nav-link" href="../html/ContactPage.php">
              Contact
            </a>
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

  <section class="header">
    <p class="header-title">
      About Us
    </p>
  </section>

  <section class="content-container">
    <h1 class="content-title">
      Supporting Seniors <br>
      with Care and Comfort
    </h1>
    <div class="line"></div>
  </section>

  <div class="tabs">
    <article class="mission">
      <h1 class="mission_text">Mission</h1>
    </article>
    <article class="purpose">
      <h1 class="purpose_text">Purpose</h1>
    </article>
    <article class="vision">
      <h1 class="vision_text">Vision</h1>
    </article>
  </div>

  <div class="slider"> 
    <div class="slides"> 
      <div class="slide"> 
        <img src="../assets/Mission.png" alt="Image 1"> 
      </div> 
      <div class="slide"> 
        <img src="../assets/Purpose.png" alt="Image 2"> 
      </div> 
      <div class="slide"> 
        <img src="../assets/Vision.png" alt="Image 3"> 
      </div> 
    </div>
    <div class="slider_buttons">
      <button class="prev" onclick="changeSlide(-1)">&#10094;</button> 
      <button class="next" onclick="changeSlide(1)">&#10095;</button> 
    </div>
  </div>

  <section class="features">
    <h1 class="features-title">
      Our Features
    </h1>

    <div class="features-container">
      <article class="feature-support">
        <img src="../assets/feature1.png" alt="" class="feature-image">
        <h1 class="support-guidance-title">
          Support and guidance 
        </h1>
        <p class="support-guidance-paragraph">
          Health Articles: Expert-written articles <br> 
          offering tips and guidance on senior <br>
          health and wellness <br>
        </p>
        <div class="link_button">
          <a href="/html/ArticlesPage.html" class="article-button">
            See Article
          </a>
        </div>
      </article>

      <article class="feature-catalog">
        <img src="../assets/feature2.png" alt="" class="feature-image">
        <h1 class="product-catalog-title">
          Product Catalog 
        </h1>
        <p class="product-catalog-paragraph">
          Explore our product catalog with a range of <br> 
          mobility aids, health supplements, personal <br> 
          care items, and daily living tools.
        </p>
        <div class="link_button">
          <a href="/html/LandingPage.html" class="shop-button">
            Shop Now
          </a>
        </div>
      </article>
    </div>
  </section>

  <section class="FAQ">
    <div class="FAQ-container">
       <h1 class="FAQ-title">
        FAQ'S <br>
        Frequently Asked Questions
       </h1>
       <div class="FAQ-products">
          <div class="FAQ-question-con">
             <h1 class="FAQ-question">
              1. What types of products do you offer?
             </h1>
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                <path 
                   fill="none" 
                   stroke="#5267DF" 
                   stroke-width="3" 
                   d="M1 1l8 8 8-8"/>
             </svg>
          </div>
          <div class="FAQ-answer-con">
             <p class="FAQ-answer">
              We offer a wide range of essential products designed to enhance the daily lives of seniors, including mobility aids, health supplements, personal care items, home safety equipment, and daily living tools. Our goal is to provide everything you need to support health, independence, and overall well-being.
             </p>
          </div>
       </div>

       <div class="FAQ-browser">
          <div class="FAQ-question-con">
            <h1 class="FAQ-question">
              2. How do I place an order online?
             </h1>
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                <path 
                   fill="none" 
                   stroke="#5267DF" 
                   stroke-width="3" 
                   d="M1 1l8 8 8-8"/>
             </svg>
          </div>
          <div class="FAQ-answer-container">
             <p class="FAQ-answer">
                Vivamus luctus eros aliquet convallis ultricies. Mauris augue massa, ultricies non ligula. 
                Suspendisse imperdiet. Vivamus luctus eros aliquet convallis ultricies. Mauris augue massa, 
                ultricies non ligula. Suspendisse imperdie tVivamus luctus eros aliquet convallis ultricies. 
                Mauris augue massa, ultricies non ligula. Suspendisse imperdiet.
             </p>
          </div>
       </div>
       
       <div class="FAQ-mobile">
          <div class="FAQ-question-con">
            <h1 class="FAQ-question">
              3. How can I track my order?
             </h1>
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                <path 
                   fill="none" 
                   stroke="#5267DF" 
                   stroke-width="3" 
                   d="M1 1l8 8 8-8"/>
             </svg>
          </div>
          <div class="FAQ-answer-container">
             <p class="FAQ-answer">
                Sed consectetur quam id neque fermentum accumsan. Praesent luctus vestibulum dolor, ut condimentum 
                urna vulputate eget. Cras in ligula quis est pharetra mattis sit amet pharetra purus. Sed 
                sollicitudin ex et ultricies bibendum.o eget ultricies fringilla. Phasellus blandit ipsum quis quam ornare mattis.
             </p>
          </div>
       </div>
      
       <div class="FAQ-chromium">
          <div class="FAQ-question-con">
            <h1 class="FAQ-question">
              4. Do you offer customer support?
             </h1>
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                <path 
                   fill="none" 
                   stroke="#5267DF" 
                   stroke-width="3" 
                   d="M1 1l8 8 8-8"/>
             </svg>
          </div>
          <div class="FAQ-answer-container">
             <p class="FAQ-answer">
                Integer condimentum ipsum id imperdiet finibus. Vivamus in placerat mi, at euismod dui. Aliquam 
                vitae neque eget nisl gravida pellentesque non ut velit.
                eget ultricies fringilla. Phasellus blandit ipsum quis quam ornare mattis.
             </p>
          </div>
       </div>
    </div>
 </section>

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
        <img src="../assets/paypal.png" alt="Gcash" class="payment-image">
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