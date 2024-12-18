<?php
session_start();

require '../connection/connection.php';

if(!isset($_SESSION['username'])){
  header("Location: Login.php");
  exit();
}

$username = $_SESSION['username'];
$email_phone = $_SESSION['email_phone'];
$name = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/CartPage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a href="../html/LandingPage.php" class="logo"> 
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
            <a href="../html/Login.php" class="login_signup_link">
                <?php echo ($username); ?>
            </a>
          </div>
          <div class="cart">
            <a href="#" class="cart">
              <img src="../assets/cart-icon.png" alt="" class="cart-icon">
            </a>
            <span class="cart-count">0</span>
            <a href="#" class="cart_link">Cart</a>
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
                    <li><a href="../html/Login.php">Log In</a></li>
                    <li><a href="../html/Signup.php">Sign up</a></li>
                    <li><a href="../html/ForgotPassword.php">Forgot Password</a></li>
                    <li><a href="../html/user-account/AccountPage.php">My Account</a></li>
                    <li><a href="../html/Login.php">Logout</a></li>
                </ul>
          </li>
      </ul>
    </nav>
    <div class="navbar-border"></div>

    <div class="cart-container">
      <h1 class="cart-title"></h1>

      <div class="cart-items-container">
        <article class="cart-item">
          <div class="cart">
            <div class="cart-details">
                <div class="shop">
                    <div id="item"></div>
                  </div>
              </div> 
          </div> 
        </article>

        <article class="cart-summary">
          <div class="summary-container">
            <h1 class="summary-title">Order Summary</h1>
            <div class="subtotal">
              <p class="summary-total"></p>
              <span class="subtotal-amount">0</span>
            </div>
            <a href="../html/CheckoutPage.php" style="text-decoration: none;" onclick="proceedToCheckout()">
              <button class="checkout-btn">
                PROCEED TO CHECKOUT
              </button>
            </a>
          </div>
        </article>

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
// Function to get the current user's cart key
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

function updateCartTitle() {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
  const totalUniqueItems = cart.length;
  const itemText = totalUniqueItems === 1 ? "item" : "items";
  document.querySelector('.cart-title').textContent = `My shopping cart (${totalUniqueItems} ${itemText})`;
}

function updateCartSummary() {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
  const subtotalText = document.querySelector('.summary-total');
  const subtotalAmount = document.querySelector('.subtotal-amount');

  const totalUniqueItems = cart.length;
  const totalPrice = cart.reduce((total, item) => total + item.quantity * item.price, 0);

  const itemText = totalUniqueItems === 1 ? "item" : "items";
  subtotalText.textContent = `Subtotal (${totalUniqueItems} ${itemText})`;
  subtotalAmount.textContent = `₱ ${totalPrice.toLocaleString()}`;
}

// Display cart items for the current user
function displayCartItems() {
  const cartKey = getCartKey();
  const cartContainer = document.getElementById('item');
  const cartSummary = document.querySelector('.cart-summary');
  const cartTitle = document.querySelector('.cart-title');
  const cartCount = document.querySelector('.cart-count');

  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];

  if (cart.length === 0) {
    cartContainer.innerHTML = '<p class="empty-cart-message">Your cart is empty.</p>';
    cartSummary.style.display = 'none';
    cartTitle.style.display = 'none';
    cartCount.style.display = 'none';
    updateCartTitle();
    updateCartSummary();
    return;
  }

  cartContainer.innerHTML = '';

  cart.forEach(item => {
    const formattedPrice = `₱ ${item.price.toLocaleString()}`;
    const formattedTotalPrice = `₱ ${(item.price * item.quantity).toLocaleString()}`;

    const cartItemElement = document.createElement('div');
    cartItemElement.className = 'item';
    cartItemElement.innerHTML = `
      <img src="${item.image}" alt="${item.name}" class="item-image">
      <div class="details">
        <h3 class="product-name">${item.name}</h3>
        <h4 class="product-total-price">Price: ${formattedTotalPrice}</h4>
        <div class="quantity-control">
          <button class="quantity-btn decrease" data-id="${item.id}">-</button>
          <input type="number" class="quantity-input" value="${item.quantity}" min="1" onchange="changeQuantity(${item.id}, this.value)">
          <button class="quantity-btn increase" data-id="${item.id}">+</button>
        </div>
        <div class="button-area">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#313A5E" class="delete-button" data-id="${item.id}">
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
          </svg>
        </div>
      </div>
    `;
    cartContainer.appendChild(cartItemElement);
  });

  cartSummary.style.display = 'block';
  updateCartTitle();
  updateCartSummary();

  // Event listeners
  document.querySelectorAll('.decrease').forEach(button => {
    button.addEventListener('click', (e) => decreaseQuantity(parseInt(e.target.dataset.id)));
  });

  document.querySelectorAll('.increase').forEach(button => {
    button.addEventListener('click', (e) => increaseQuantity(parseInt(e.target.dataset.id)));
  });

  document.querySelectorAll('.delete-button').forEach((button, index) => {
    button.addEventListener('click', () => removeItem(cart[index].id));
  });
}

// Function to update the item quantity in the cart based on user action (increase or decrease)
function updateCartItemQuantity(id, quantityChange) {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
  const item = cart.find(item => item.id === id);
  if (item) {
    item.quantity = Math.max(1, item.quantity + quantityChange);
    localStorage.setItem(cartKey, JSON.stringify(cart));
    displayCartItems();
  }
}

function increaseQuantity(id) {
  updateCartItemQuantity(id, 1);
}

function decreaseQuantity(id) {
  updateCartItemQuantity(id, -1);
}

// Function to change the quantity of an item directly through the input field
function changeQuantity(id, newQuantity) {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
  const item = cart.find(item => item.id === id);
  if (item) {
    item.quantity = Math.max(1, parseInt(newQuantity, 10));
    localStorage.setItem(cartKey, JSON.stringify(cart));
    displayCartItems();
  }
}

// Remove an item from the cart
function removeItem(id) {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
  const updatedCart = cart.filter(item => item.id !== id);
  localStorage.setItem(cartKey, JSON.stringify(updatedCart));
  displayCartItems();
  updateCartCount();
}

// Function to periodically save the cart to MongoDB
function autoSaveCart() {
  const cartKey = getCartKey();
  const cart = JSON.parse(localStorage.getItem(cartKey)) || [];
  const totalPrice = cart.reduce((total, item) => total + item.price * item.quantity, 0);

  fetch('./saveCart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      username: "<?php echo $_SESSION['username']; ?>",
      cart,
      totalPrice
    })
  })
  .then(response => response.json())
  .then(data => {
    if (!data.success) {
      console.error('Failed to save cart:', data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
}

// Call autoSaveCart every 3 seconds
setInterval(autoSaveCart, 3000);

displayCartItems();
updateCartCount();
</script>


</html>
