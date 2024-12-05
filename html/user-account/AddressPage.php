<?php 

session_start();
require '../../connection/connection.php';

$username = $_SESSION['username'];
$name = $_SESSION['name'];
$email_phone = $_SESSION['email_phone'];

// Mask the email
function maskEmail($email) {
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
  <title>Elder Living | Account Address Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../../css/user-account/AddressPage.css?v=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a 
        href="../../html/LandingPage.php" 
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
              <?php echo ($username); ?>
            </a>
          </div>

          <div class="cart-icon-container">
            <div class="cart">
              <a href="/html/CartPage.php" class="cart">
                <img src="../../assets/cart-icon.png" alt="" class="cart-icon">
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
              <img src="../../assets/search-icon.png" alt="Search Icon" class="search-icon">
          </div>
          <li>
              <a class="nav-link" href="../../html/LandingPage.php">Home</a>
          </li>
          <li>
              <a class="nav-link" href="../../html/ArticlesPage.php">Articles</a>
          </li>
          <li>
              <a class="nav-link" href="../../html/AboutPage.php">About</a>
          </li>
          <li>
              <a class="nav-link" href="../../html/ContactPage.php">Contact</a>
          </li>

          <li class="dropdown" style="display: flex; cursor: pointer; position: relative;">
              <a class="nav-link" href="../../html/CategoryPage.php">Categories</a>
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
              <a class="nav-link" href="#">Account</a>
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="dropdown-icon" style="margin: 0.2rem 0 0 0.5rem;">
                  <path d="M14.25 6.375L9 11.625L3.75 6.375" stroke="#313A5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
                <ul class="account-submenu">
                      <li><a href="../Login.php">Log In</a></li>
                      <li><a href="../Signup.php">Sign up</a></li>
                      <li><a href="../../html/ForgotPassword.php">Forgot Password</a></li>
                      <li><a href="../../html/user-account/AccountPage.php">My Account</a></li>
                      <li><a href="../Login.php">Logout</a></li>
                </ul>
          </li>
      </ul>
    </nav>
    <div class="navbar-border"></div>

    <div class="sidebar-menu">
      <a href="javascript:void(0);" class="icon" onclick="openAccountSidebar()">
          <img src="/assets/sidebar-menu.png" alt="">
      </a>
    </div>
  
    <section class="account-container">
        <article class="account-nav">
            <div class="profile">
                <img src="../../assets/profile.png" alt="Profile Picture" style="width: 5rem;">
                <div class="profile-info">
                    <p class="profile-name"><?php echo ($name);  ?></p>
                    <p class="profile-email">edit your account</p>
                </div>
            </div>
            <div class="nav-options">
                <a href="../../html/user-account/AccountPage.php" class="nav-option personal">Personal Information</a>
                <a href="" class="nav-option address">Addresses</a>
                <a href="../../html/user-account/PasswordPage.php" class="nav-option password">Password</a>
                <a href="../../html/user-account/PurchasePage.php" class="nav-option purchase">My Purchase</a>
                <a href="../login.php" class="nav-option logout">LOGOUT</a>
            </div>
        </article>
    
        <article class="account-details">
            <div class="section profile-overview">
                <div class="section-one">
                     <h1>My Addresses</h1>
                     <p>Protect your account</p>
                </div>
                <div class="section-two">
                     <button class="add-new-btn">Add New Address</button>
                </div>
            </div>
      
            <div class="account-section-four" id="addressList"></div>
      
            <div class="btn-section save-changes">
                <button class="save-btn">Save Changes</button>
            </div>
      </article>
      
      <div id="addressModal" class="modal-address">
          <div class="address-modal-content">
              <span 
                  class="close-btn">&times;</span>
              <h2>
                  Add New Address
              </h2>
              <form id="newAddressForm">
                  <label for="full-name">Full Name</label>
                  <input type="text" id="full-name" required>

                  <label for="phone-number">Phone Number</label>
                  <input type="text" id="phone-number" required>

                  <label for="street" class="street-label">Street, Building, House Number</label>
                  <input type="text" id="street" required>
                  
                  <label for="location">Province, Region, City</label>
                  <input type="text" id="location" required>
                  
                  <label for="postal-code">Postal Code</label>
                  <input type="text" id="postal-code" required>
      
                  <div class="set-container">
                      <label for="set-as">Set as?</label>

                      <label for="modal-home">
                          <input type="radio" id="modal-home" name="set-as"> Home
                      </label>

                      <label for="modal-work">
                          <input type="radio" id="modal-work" name="set-as"> Work
                      </label>

                      <label for="set-default">
                          <input type="checkbox" id="set-default"> Set as Default Address
                      </label><br>
                  </div>
                  <button type="submit" class="save-address-btn">Save Address</button>
              </form>
          </div>
      </div>
    
      <div class="sidebar-profile" id="account-sidebar">
          <div class="side-profile">
              <img src="/assets/profile.png" alt="Profile Picture" class="side-profile-pic">
              <div class="side-profile-info">
                  <p class="profile-name">Leo Idk</p>
                  <p class="profile-email">edit your account</p>
              </div>
          </div>
  
          <div class="sidebar-close-menu">
              <a href="" onclick="closeAccountSidebar()">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#313A5E">
                      <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                  </svg>
              </a>
          </div>
  
          <div class="nav-options">
              <a href="/html/user-account/AccountPage.html" class="nav-option personal">Personal Information</a>
              <a href="" class="nav-option address">Addresses</a>
              <a href="/html/user-account/PasswordPage.html" class="nav-option password">Password</a>
              <a href="/html/user-account/PurchasePage.html" class="nav-option purchase">My Purchase</a>
              
              <div class="sidebar-logout-container">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#313A5E">
                      <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
                  </svg>
                  <a href="" class="nav-option sidebar-logout">Log out</a>
              </div>
          </div>
      </div>
    </section>
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
        <img src="../../assets/paypal.png" alt="Gcash" class="payment-image">
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

function openAccountSidebar() {
  const sidebar = document.getElementById('account-sidebar');
  sidebar.style.display = 'block';
}

function closeAccountSidebar() {
  const sidebar = document.getElementById('account-sidebar');
  sidebar.style.display = 'none';
  return false;
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

var modal = document.getElementById("addressModal");
var btn = document.querySelector(".add-new-btn");
var span = document.querySelector(".close-btn");

var currentEditAddress = null;

window.onload = function() {
    loadAddressesFromLocalStorage();
}

btn.onclick = function() {
    modal.style.display = "block";
    currentEditAddress = null;
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

document.getElementById("newAddressForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var fullName = document.getElementById("full-name").value;
    var phoneNumber = document.getElementById("phone-number").value;
    var street = document.getElementById("street").value;
    var location = document.getElementById("location").value;
    var postalCode = document.getElementById("postal-code").value;
    var setDefault = document.getElementById("set-default").checked;
    var setAsHome = document.getElementById("modal-home").checked;
    var setAsWork = document.getElementById("modal-work").checked;

    var address = {
        fullName: fullName,
        phoneNumber: phoneNumber,
        street: street,
        location: location,
        postalCode: postalCode,
        setDefault: setDefault,
        setAsHome: setAsHome,
        setAsWork: setAsWork
    };

    if (currentEditAddress) {
        currentEditAddress.querySelector('.address-header h3').textContent = fullName;
        currentEditAddress.querySelector('.address-header p').textContent = phoneNumber;
        currentEditAddress.querySelector('.address-label').innerHTML = `${street} <br> ${location} <br> ${postalCode}`;
        currentEditAddress.querySelector('.default-label').textContent = setDefault ? 'Default Address' : '';
        currentEditAddress.querySelector('.radio-input').checked = setDefault;
        currentEditAddress.querySelector('.radio-label').textContent = setAsHome ? 'Home' : setAsWork ? 'Work' : '';
    } else {
        var newAddress = document.createElement('article');
        newAddress.classList.add('address-item');
        newAddress.innerHTML = `
            <div class="radio-container">
                <input type="radio" name="location" class="radio-input" style="height:20px; width:20px; margin-top: 1.8px;" ${setDefault ? 'checked' : ''}>
                <label for="home" class="radio-label">${setAsHome ? 'Home' : setAsWork ? 'Work' : 'Other'}</label>
            </div>
            <div class="address-header">
                <h3 class="address-name">${fullName}</h3>
                <p class="address-number">${phoneNumber}</p>
            </div>
            <div class="address-container">
                <p class="address-label">
                    ${street}
                    ${location}
                    ${postalCode}
                </p>
                <p class="default-label">${setDefault ? 'Default Address' : ''}</p>
                <div class="edit-delete-btn">
                    <button class="edit-label">Edit</button>
                    <button class="delete-label">Delete</button>
                </div>
            </div>
        `;
        document.getElementById('addressList').appendChild(newAddress);
        attachEditDeleteListeners(newAddress);
    }

    saveAddressesToLocalStorage();

    modal.style.display = "none";
    document.getElementById("newAddressForm").reset();
});

function attachEditDeleteListeners(addressElement) {
    var editButton = addressElement.querySelector('.edit-label');
    var deleteButton = addressElement.querySelector('.delete-label');

    editButton.addEventListener('click', function() {
        var fullName = addressElement.querySelector('.address-header h3').textContent;
        var phoneNumber = addressElement.querySelector('.address-header p').textContent;
        var street = addressElement.querySelector('.address-label').innerHTML.split('<br>')[0];
        var location = addressElement.querySelector('.address-label').innerHTML.split('<br>')[1];
        var postalCode = addressElement.querySelector('.address-label').innerHTML.split('<br>')[2];
        var setDefault = addressElement.querySelector('.radio-input').checked;
        var setAsHome = addressElement.querySelector('.radio-label').textContent === 'Home';
        var setAsWork = addressElement.querySelector('.radio-label').textContent === 'Work';

        document.getElementById("full-name").value = fullName;
        document.getElementById("phone-number").value = phoneNumber;
        document.getElementById("street").value = street;
        document.getElementById("location").value = location;
        document.getElementById("postal-code").value = postalCode;
        document.getElementById("set-default").checked = setDefault;
        document.getElementById("modal-home").checked = setAsHome;
        document.getElementById("modal-work").checked = setAsWork;

        currentEditAddress = addressElement;

        modal.style.display = "block";
    });

    deleteButton.addEventListener('click', function() {
        addressElement.remove();
        saveAddressesToLocalStorage(); 
    });
}

function saveAddressesToLocalStorage() {
    var addressList = [];
    document.querySelectorAll('.address-item').forEach(function(addressElement) {
        var fullName = addressElement.querySelector('.address-header h3').textContent;
        var phoneNumber = addressElement.querySelector('.address-header p').textContent;
        var street = addressElement.querySelector('.address-label').innerHTML.split('<br>')[0];
        var location = addressElement.querySelector('.address-label').innerHTML.split('<br>')[1];
        var postalCode = addressElement.querySelector('.address-label').innerHTML.split('<br>')[2];
        var setDefault = addressElement.querySelector('.radio-input').checked;
        var setAsHome = addressElement.querySelector('.radio-label').textContent === 'Home';
        var setAsWork = addressElement.querySelector('.radio-label').textContent === 'Work';

        addressList.push({
            fullName: fullName,
            phoneNumber: phoneNumber,
            street: street,
            location: location,
            postalCode: postalCode,
            setDefault: setDefault,
            setAsHome: setAsHome,
            setAsWork: setAsWork
        });
    });

    localStorage.setItem('addresses', JSON.stringify(addressList));
}

function loadAddressesFromLocalStorage() {
    var addressList = JSON.parse(localStorage.getItem('addresses')) || [];
    addressList.forEach(function(address) {
        var newAddress = document.createElement('article');
        newAddress.classList.add('address-item');
        newAddress.innerHTML = `
            <div class="radio-container">
                <input type="radio" name="location" class="radio-input" style="height:20px; width:20px; margin-top: 1.8px;" ${address.setDefault ? 'checked' : ''}>
                <label for="home" class="radio-label">${address.setAsHome ? 'Home' : address.setAsWork ? 'Work' : 'Other'}</label>
            </div>
            <div class="address-header">
                <h3 class="address-name">${address.fullName}</h3>
                <p class="address-number">${address.phoneNumber}</p>
            </div>
            <div class="address-container">
                <p class="address-label">
                    ${address.street} <br>
                    ${address.location} <br>
                    ${address.postalCode}
                </p>
                <p class="default-label">${address.setDefault ? 'Default Address' : ''}</p>
                <div class="edit-delete-btn">
                    <button class="edit-label">Edit</button>
                    <button class="delete-label">Delete</button>
                </div>
            </div>
        `;
        document.getElementById('addressList').appendChild(newAddress);
        attachEditDeleteListeners(newAddress);
    });
}
</script>
</html>