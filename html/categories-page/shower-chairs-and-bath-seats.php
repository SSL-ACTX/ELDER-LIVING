<?php

session_start();
require '../../connection/connection.php';

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adaptive Kitchen Tools Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../../css/category-page/shower-chairs-and-bath-seats.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a 
        href="/html/LandingPage.html" 
        class="logo" style="text-decoration: none;"> 
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
          src="../../assets/search-icon.png" 
          alt="Search Icon" 
          class="search-icon"
        >
      </div>

      <div class="user-cart-container">
        <div class="topnav">
          <div class="user">
            <img src="../../assets/user.png" alt="User Icon" class="user-icon">
            <a href="/html/Login.html" class="login_signup_link">
              Login / Signup
            </a>
          </div>
          
          <div class="cart-icon-container">
            <div class="cart">
              <a href="/html/CartPage.html" class="cart">
                <img src="/assets/cart-icon.png" alt="" class="cart-icon">
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
              <a class="nav-link" href="/html/LandingPage.html">Home</a>
          </li>
          <li>
              <a class="nav-link" href="/html/ArticlesPage.html">Articles</a>
          </li>
          <li>
              <a class="nav-link" href="/html/AboutPage.html">About</a>
          </li>
          <li>
              <a class="nav-link" href="/html/ContactPage.html">Contact</a>
          </li>

          <li class="dropdown" style="display: flex; cursor: pointer; position: relative;">
              <a class="nav-link" href="/html/CategoryPage.html">Categories</a>
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="dropdown-icon" style="margin: 0.2rem 0 0 0.5rem;">
                  <path d="M14.25 6.375L9 11.625L3.75 6.375" stroke="#313A5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <div class="submenu-container">
                <ul class="submenu">
                  <div class="submenu-one">
                    <li><a href="/html/categories-page/adaptive-kitchen-tools.html">Adaptive Kitchen Tools</a></li>
                    <li><a href="/html/categories-page/bedroom-bathroom.html">Bedroom & Bathroom</a></li>
                    <li><a href="/html/categories-page/core-products.html">Core Products</a></li>
                    <li><a href="/html/categories-page/daily-living-aids.html">Daily Living Aids</a></li>
                    <li><a href="/html/categories-page/emergency-medical.html">Emergency Medical</a></li>
                    <li><a href="/html/categories-page/first-aid-kits.html">First Aid Kits</a></li>
                    <li><a href="/html/categories-page/grab-bars-and-handrails.html">Grab Bars and Handrails</a></li>
                  </div>

                  <div class="submenu-two" >
                    <li><a href="/html/categories-page/home-safety-and-comfort.html">Home Safety and Comfort</a></li>
                    <li><a href="/html/categories-page/incontinence-products.html">Incontinence Products</a></li>
                    <li><a href="/html/categories-page/jar-openers.html">Jar Openers</a></li>
                    <li><a href="/html/categories-page/kitchen-aids.html">Kitchen Aids</a></li>
                    <li><a href="/html/categories-page/lightingaids.html">Lighting Aids</a></li>
                    <li><a href="/html/categories-page/mobility-aids.html">Mobility Aids</a></li>
                    <li><a href="/html/categories-page/nutritional-supplements.html">Nutritional Supplements</a></li>
                  </div>

                  <div class="submenu-three" >
                    <li><a href="/html/categories-page/orthopaedic-supports.html">Orthopaedic Supports</a></li>
                    <li><a href="/html/categories-page/personal-care-products.html">Personal Care Products</a></li>
                    <li><a href="/html/categories-page/reachers-and-grabbers.html">Reachers and Grabbers</a></li>
                    <li><a href="/html/categories-page/shower-chairs-and-bath-seats.html">Shower Chairs and Bath Seats</a></li>
                    <li><a href="/html/categories-page/thermometers-and-health-monitoring-devices.html">Thermometers and Health Monitoring Devices</a></li>
                    <li><a href="/html/categories-page/wheelchair-products.html">Wheelchair Products</a></li>
                    <li><a href="/html/categories-page/zipper-pulls.html">Zipper Pulls</a></li>
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

    <h1 class="Adaptive-kitchen-tools-text">
      SHOWER CHAIRS & BATH SEATS
    </h1>

    <div class="kitchen-tools-container" id="products-container">
      <!-- Product items will be injected here dynamically -->
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
        <img src="/assets/gcash.png" alt="Gcash" class="payment-image">
        <h2 class="section-title">Follow Us</h2>
        <div class="social-icons">
          <img src="/assets/twitter.png" alt="Twitter">
          <img src="/assets/fb.png" alt="Facebook">
          <img src="/assets/insta.png" alt="Instagram">
        </div>
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

// new counter -- >
function getCartKey() {
  const username = "<?php echo $_SESSION['username']; ?>";
  return `cart_${username}`;
}

// Update the cart count for the current user
function updateCartCount() {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
  const totalUniqueItems = cart.length;
  document.querySelector('.cart-count').textContent = totalUniqueItems;
}

function updateCartCount() {
    const cartKey = getCartKey();
    const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
    const totalUniqueItems = cart.length;

    const cartCountElement = document.querySelector('.cart-count');
    cartCountElement.textContent = totalUniqueItems;
    cartCountElement.style.display = totalUniqueItems > 0 ? 'flex' : 'none';

}
// update cart count at page start
document.addEventListener('DOMContentLoaded', updateCartCount);
// new counter -- >

// dropdown cart function
// kapag hinover ko ang cart button
// mag sh-show ang dropdown cart at
// lalabas ang items na nasa cart

// update the cart dropdown
function updateCartDropdown() {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
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

document.addEventListener('DOMContentLoaded', updateCartDropdown);
// end here

window.addEventListener('load', () => {
  updateCartCount();
  updateCartDropdown();
});

</script>
<script src="./js/adaptive-kitchen.js"></script>

</html>
