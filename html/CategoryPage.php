<?php 

session_start();
require '../connection/connection.php';

$username = $_SESSION['username'];
$name = $_SESSION['name'];
$email_phone = $_SESSION['email_phone'];

// Mask email
function maskEmail($email){
  $parts = explode("@", $email);
  $username = $parts[0];
  $domain = $parts[1];
  $visible = substr($username, 0, 2);
  $maskedUsername = $visible . str_repeat("*", strlen($username) - 2);
  return $maskedUsername . "@" . $domain;
}

$maskedEmail = maskEmail($email_phone);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/CategoryPage.css?v=1.0">
  <link rel="stylesheet" href="../javascript/LandingPage.js">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a 
        href="../html/LandingPage.php" 
        class="logo"> 
        Elder Living
      </a>
      
      <div class="search-container">
        <input 
          type="search" 
          class="search-input" 
          placeholder="Search for products...." 
          name="search"
        >
        <img 
          src="../assets/search-icon.png" 
          alt="Search Icon" 
          class="search-icon"
        >
      </div>

      <div class="user-cart-container">
        <div class="topnav">
          <div class="user">  
            <img src="../assets/user.png" alt="User Icon" class="user-icon">
            <a href="/html/Login.html" class="login_signup_link">
              <?php echo ($username); ?>
            </a>
          </div>

          <div class="cart-icon-container">
            <div class="cart">
              <a href="/html/CartPage.html" class="cart">
                <img src="../assets/cart-icon.png" alt="" class="cart-icon">
              </a>
              <span class="cart-count">0</span>
              <a href="#" class="cart_link">Cart</a>
            </div>

            <div class="cart-dropdown">
              <div class="cart-items">
                <p class="cart-empty">No products yet</p>
                <p class="recently-added"></p>
              
                <div class="cart-item">
                  <img src="#" alt="product-name" class="cart-item-image">
                  <div class="cart-item-details">
                  </div>
                </div>
              </div>
              
              <div class="cart-footer">
                <a href="/html/CartPage.html" class="view-cart">View Cart</a>
              </div>
            </div>
          </div>
          
          <div class="menu">
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
          </div>
        </div>
      </div>
    </header>

    <div class="navbar-border"></div>
    <nav class="navbar" id="myTopnav">
      <ul>
          <div class="close-menu">
              <a href="javascript:void(0);" class="icon" onclick="CloseFunction()">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#313A5E">
                      <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                  </svg>
              </a>
          </div>
          <h1 class="nav-sidebar-logo">Elder Living</h1>
          <div class="sidebar-search-container">
              <input type="search" class="sidebar-search-input" placeholder="Search for products...." name="search">
              <img src="../assets/search-icon.png" alt="Search Icon" class="search-icon">
          </div>
          <li>
              <a class="nav-link" href="../html/LandingPage.php">Home</a>
          </li>
          <li>
              <a class="nav-link" href="../html/ArticlesPage.php">Articles</a>
          </li>
          <li>
              <a class="nav-link" href="../html/AboutPage.php">About</a>
          </li>
          <li>
              <a class="nav-link" href="../html/ContactPage.php">Contact</a>
          </li>

          <li class="dropdown" style="display: flex; cursor: pointer; position: relative;">
              <a class="nav-link" href="/html/CategoryPage.html">Categories</a>
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="dropdown-icon" style="margin: 0.2rem 0 0 0.5rem;">
                  <path d="M14.25 6.375L9 11.625L3.75 6.375" stroke="#313A5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <div class="submenu-container">
              <ul class="submenu">
                  <div class="submenu-one">
                    <li><a href="../html/categories-page/adaptive-kitchen-tools.php">Adaptive Kitchen Tools</a></li>
                    <li><a href="../html/categories-page/bedroom-bathroom.php">Bedroom & Bathroom</a></li>
                    <li><a href="../html/categories-page/core-products.php">Core Products</a></li>
                    <li><a href="../html/categories-page/daily-living-aids.php">Daily Living Aids</a></li>
                    <li><a href="../html/categories-page/emergency-medical.php">Emergency Medical</a></li>
                    <li><a href="../html/categories-page/first-aid-kits.php">First Aid Kits</a></li>
                    <li><a href="../html/categories-page/grab-bars-and-handrails.php">Grab Bars and Handrails</a></li>
                  </div>

                  <div class="submenu-two" >
                    <li><a href="../html/categories-page/home-safety-and-comfort.php">Home Safety and Comfort</a></li>
                    <li><a href="../html/categories-page/incontinence-products.php">Incontinence Products</a></li>
                    <li><a href="../html/categories-page/jar-openers.php">Jar Openers</a></li>
                    <li><a href="../html/categories-page/kitchen-aids.php">Kitchen Aids</a></li>
                    <li><a href="../html/categories-page/lightingaids.php">Lighting Aids</a></li>
                    <li><a href="../html/categories-page/mobility-aids.php">Mobility Aids</a></li>
                    <li><a href="../html/categories-page/nutritional-supplements.php">Nutritional Supplements</a></li>
                  </div>

                  <div class="submenu-three" >
                    <li><a href="../html/categories-page/orthopaedic-supports.php">Orthopaedic Supports</a></li>
                    <li><a href="../html/categories-page/personal-care-products.php">Personal Care Products</a></li>
                    <li><a href="../html/categories-page/reachers-and-grabbers.php">Reachers and Grabbers</a></li>
                    <li><a href="../html/categories-page/shower-chairs-and-bath-seats.php">Shower Chairs and Bath Seats</a></li>
                    <li><a href="../html/categories-page/thermometers-and-health-monitoring-devices.php">Thermometers and Health Monitoring Devices</a></li>
                    <li><a href="../html/categories-page/wheelchair-products.php">Wheelchair Products</a></li>
                    <li><a href="../html/categories-page/zipper-pulls.php">Zipper Pulls</a></li>
                  </div>
                </ul>
              </div>
          </li>

          <li class="dropdown" style="display: flex; cursor: pointer;">
              <a class="nav-link" href="/html/user-account/AccountPage.html">Account</a>
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="dropdown-icon" style="margin: 0.2rem 0 0 0.5rem;">
                  <path d="M14.25 6.375L9 11.625L3.75 6.375" stroke="#313A5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
                <ul class="account-submenu">
                    <li><a href="/html/Login.html">Log In</a></li>
                    <li><a href="/html/Signup.html">Sign up</a></li>
                    <li><a href="/html/ForgotPassword.html">Forgot Password</a></li>
                    <li><a href="/html/user-account/AccountPage.html">My Account</a></li>
                </ul>
          </li>
      </ul>
    </nav>
    <div class="navbar-border"></div>

      <div class="category">
        <article class="side-category">
          <div class="side-category-list">
            <h1>Shop by Categories</h1>
              <li class="side-list">
                <a href="../html/categories-page/adaptive-kitchen-tools.php">
                  Adaptive Kitchen Tools
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/bedroom-bathroom.php">
                  Bedroom / Bathroom
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/core-products.php">
                  Core Products
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/daily-living-aids.php">
                  Daily Living Aids
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/emergency-medical.php">
                  Emergency Medical
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/first-aid-kits.php">
                  First Aid Kits
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/grab-bars-and-handrails.php">
                  Grab Bars and Handrails
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/home-safety-and-comfort.php">
                  Home Safety and Comfort
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/incontinence-products.htphpml">
                  Incontinence Products
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/jar-openers.php">
                  Jar Openers
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/kitchen-aids.php">
                  Kitchen Aids
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/lightingaids.php">
                  Lighting Aids
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/mobility-aids.php">
                  Mobility Aids
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/nutritional-supplements.php">
                  Nutritional Supplements 
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/orthopaedic-supports.php">
                  Orthopaedic Supports
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/personal-care-products.php">
                  Personal Care Products
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/reachers-and-grabbers.php">
                  Reachers and Grabbers
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/shower-chairs-and-bath-seats.php">
                  Shower Chairs and Bath Seats
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/thermometers-and-health-monitoring-devices.php">
                  Thermometers and Health Monitoring Devices
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/wheelchair-products.php">
                  Wheelchair Products
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/xerostomia-products.php">
                  Xerostomia Products
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
              <li class="side-list">
                <a href="../html/categories-page/zipper-pulls.php">
                  Zipper Pulls
                </a>
                <img src="../assets/right-arrow.png" alt="right-arrow"  style="cursor: pointer;">
              </li>
          </div>
        </article>

        <article class="main-category">
          <div class="category-label">
            <h1>All Categories</h1>
          </div>
          <div class="main-category-list">
            <a href="../html/categories-page/adaptive-kitchen-tools.php" class="Adaptive-kitchen-tools">
              <div class="category-item">   
              <img src="../assets/adaptive.png" alt="Adaptive Kitchen Tools" class="category-image">
                <h1 class="Adaptive-kitchen-tools-text">
                  Adaptive Kitchen Tools
                </h1>
              </div> 
            </a>
    
            <a href="../html/categories-page/bedroom-bathroom.php" class="Bedroom-Bathroom">
              <div class="category-item">
                <img src="../assets/bedroom/bedroom.png" alt="" class="Bedroom-Bathroom-image" style="margin-top: 45px; margin-left: 15px;">
                <h1 class="Bedroom-Bathroom-text">
                  Bedroom / Bathroom
                </h1>
              </div>
            </a>
      
            <a href="../html/categories-page/core-products.php" class="Core-products">
              <div class="category-item">   
                <img src="../assets/core-products.png" alt="" class="Core-products-image" style="margin-top: 45px;">
                <h1 class="Core-products-text">
                  Core Products
                </h1>
              </div>
            </a>
      
            <a href="../html/categories-page/daily-living-aids.php" class="Daily-living-aids">
              <div class="category-item">
                <img src="../assets/daily-living-aids.png" alt="" class="Daily-living-aids-image">
                <h1 class="Daily-living-aids-text">
                  Daily Living Aids
                </h1>
              </div>
            </a>
    
            <a href="../html/categories-page/emergency-medical.php" class="Emergency-medical">
              <div class="category-item">
                <img src="../assets/emergency-medical.png" alt="" class="Emergency-medical-image"style="margin-top: 45px; margin-left: 12px;">
                <h1 class="Emergency-medical-text">
                  Emergency Medical
                </h1>
              </div>
            </a>

            <a href="../html/categories-page/first-aid-kits.php" class="First-aid-kits">
              <div class="category-item">
                <img src="../assets/bandages.png" alt="" class="First-aid-kits-image">
                <h1 class="First-aid-kits-text">
                  First Aid Kits
                </h1>
              </div>
            </a>

            <a href="../html/categories-page/grab-bars-and-handrails.php" class="Grab-bars">
              <div class="category-item">
                <img src="../assets/grab-bars.png" alt="" class="Grab-bars-image" style="margin-top: 45px; margin-left: 18px;">
                <h1 class="Grab-bars-text">
                  Grab Bars and Handrails
                </h1>
              </div>
            </a>

            <a href="../html/categories-page/home-safety-and-comfort.php" class="Home-safety">
              <div class="category-item">
                <img src="../assets/home-safety-comfort.png" alt="" class="Home-safety-image" style="margin-top: 45px; margin-left: 35px;">
                <h1 class="Home-safety-text">
                  Home Safety and Comfort
                </h1>
              </div>  
            </a>

            <a href="../html/categories-page/incontinence-products.php" class="Incontinence-product">
              <div class="category-item">
                <img src="../assets/incontinence-product.png" alt="" class="Incontinence-product-image" style="margin-top: 45px; margin-left: 20px;">
                <h1 class="Incontinence-product-text">
                  Incontinence Products
                </h1>
              </div>
            </a>

            <a href="../html/categories-page/jar-openers.php" class="Jar-openers">
              <div class="category-item">
                <img src="../assets/jar-openers.png" alt="" class="Jar-openers-image">
                <h1 class="Jar-openers-text">
                  Jar Openers
                </h1>
              </div>
            </a>
          </div>
        </article>
      </div>

     <div class="pagination">
          <a href="CategoryPage.php"><</a>
          <a href="CategoryPage.php" class="active">1</a>
          <a href="../html/category-pagination/category-pagination-2.php">2</a> 
          <a href="../html/category-pagination/category-pagination-3.php">3</a>
          <a href="../html/category-pagination/category-pagination-2.php">></a>
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
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function CloseFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className.includes("closed")) {
        x.className = "navbar";
    } else {
        x.className += " closed";
    }
}

function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const totalUniqueItems = cart.length;

  const cartCountElement = document.querySelector('.cart-count');
  cartCountElement.textContent = totalUniqueItems;
  cartCountElement.style.display = totalUniqueItems > 0 ? 'flex' : 'none'; 
}

function updateCartDropdown() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const cartItemsContainer = document.querySelector('.cart-items');
  const viewCartLink = document.querySelector('.cart-footer');  
  cartItemsContainer.innerHTML = ''; 

  if (cart.length === 0) {
    cartItemsContainer.innerHTML = '<p class="empty-message">Your cart is empty.</p>';
    viewCartLink.style.display = 'none'; 
  } else {
    const recentlyAddedText = document.createElement('p');
    recentlyAddedText.className = 'recently-added-text';
    recentlyAddedText.textContent = 'Recently Added';
    cartItemsContainer.appendChild(recentlyAddedText);

    cart.forEach(item => {
      const formattedPrice = item.price ? `₱ ${item.price.toLocaleString()}` : '₱ 0.00';

      const cartItemElement = document.createElement('div');
      cartItemElement.className = 'cart-item';
      cartItemElement.innerHTML = `
        <img src="${item.image || 'default-image-url'}" alt="${item.name || 'Unnamed Product'}" class="cart-item-image">
        <div class="cart-item-details">
          <span class="cart-item-name">${item.name || 'Unnamed Product'}</span>
          <span class="cart-item-price">${formattedPrice}</span> 
        </div>
      `;
      cartItemsContainer.appendChild(cartItemElement);
    });
    viewCartLink.style.display = 'block';
  }
}

window.addEventListener('load', () => {
  updateCartCount();
  updateCartDropdown();
});

</script>
</html>