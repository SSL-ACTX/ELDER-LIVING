<?php 
session_start();
require '../../connection/connection.php';

$username = $_SESSION['username'];
$email_phone = $_SESSION['email_phone'];
$name = $_SESSION['name'];
$gender = $_SESSION['gender'];
$dob = $_SESSION['dob'];
function maskEmail($email) {
    $parts = explode("@", $email);
    $username = $parts[0];
    $domain = $parts[1];
    $visible = substr($username, 0, 2);
    $maskedUsername = $visible . str_repeat("*", strlen($username) - 2);
    return $maskedUsername . "@" . $domain;
}

$maskedEmail = maskEmail($email_phone);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $newUsername = $_POST['username']; 
  $name = $_POST['name'];            
  $gender = $_POST['gender'];        
  $day = $_POST['day'];              
  $month = $_POST['month'];          
  $year = $_POST['year'];            

  $dob = $year . '-' . $month . '-' . $day; 

 
  $userData = [
      'username' => $newUsername,
      'name' => $name,
      'gender' => $gender,
      'dob' => $dob
  ];

  $updateResult = $collection->updateOne(
      ['username' => $username],
      ['$set' => $userData]
  );

  if ($updateResult->getModifiedCount() > 0) {
     echo "<script>alert('Your details have been updated successfully!');</script>";
      $_SESSION['username'] = $newUsername;
      $_SESSION['name'] = $name;
      $_SESSION['gender'] = $gender;
      $_SESSION['dob'] = $dob;
  } else {
     echo "<script>alert('Failed to update details. Please try again.');</script>";
  } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elder Living | Account Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/elder-living-logo.png">
  <link rel="stylesheet" href="../../css/user-account/AccountPage.css?v=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a href="../../html/LandingPage.php" 
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
            <a href="/html/Login.php" class="login_signup_link">
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
                <a href="/html/CartPage.php" class="view-cart">View Cart</a>
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
              <img src="/assets/search-icon.png" alt="Search Icon" class="search-icon">
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
                    <li><a href="../../html/categories-page/adaptive-kitchen-tools.php">Adaptive Kitchen Tools</a></li>
                    <li><a href="/html/categories-page/bedroom-bathroom.php">Bedroom & Bathroom</a></li>
                    <li><a href="/html/categories-page/core-products.php">Core Products</a></li>
                    <li><a href="/html/categories-page/daily-living-aids.php">Daily Living Aids</a></li>
                    <li><a href="/html/categories-page/emergency-medical.php">Emergency Medical</a></li>
                    <li><a href="/html/categories-page/first-aid-kits.php">First Aid Kits</a></li>
                    <li><a href="/html/categories-page/grab-bars-and-handrails.php">Grab Bars and Handrails</a></li>
                  </div>

                  <div class="submenu-two" >
                    <li><a href="/html/categories-page/home-safety-and-comfort.php">Home Safety and Comfort</a></li>
                    <li><a href="/html/categories-page/incontinence-products.php">Incontinence Products</a></li>
                    <li><a href="/html/categories-page/jar-openers.php">Jar Openers</a></li>
                    <li><a href="/html/categories-page/kitchen-aids.php">Kitchen Aids</a></li>
                    <li><a href="/html/categories-page/lightingaids.php">Lighting Aids</a></li>
                    <li><a href="/html/categories-page/mobility-aids.php">Mobility Aids</a></li>
                    <li><a href="/html/categories-page/nutritional-supplements.php">Nutritional Supplements</a></li>
                  </div>

                  <div class="submenu-three" >
                    <li><a href="/html/categories-page/orthopaedic-supports.php">Orthopaedic Supports</a></li>
                    <li><a href="/html/categories-page/personal-care-products.php">Personal Care Products</a></li>
                    <li><a href="/html/categories-page/reachers-and-grabbers.php">Reachers and Grabbers</a></li>
                    <li><a href="/html/categories-page/shower-chairs-and-bath-seats.php">Shower Chairs and Bath Seats</a></li>
                    <li><a href="/html/categories-page/thermometers-and-health-monitoring-devices.php">Thermometers and Health Monitoring Devices</a></li>
                    <li><a href="/html/categories-page/wheelchair-products.php">Wheelchair Products</a></li>
                    <li><a href="/html/categories-page/zipper-pulls.php">Zipper Pulls</a></li>
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
              <img src="../../assets/profile.png" alt="Profile Picture" class="profile-pic">
              <div class="profile-info">
                  <p class="profile-name"><?php echo ($name);  ?></p>
                  <p class="profile-email">edit your account</p>
              </div>
          </div>
  
          <div class="nav-options">
              <a href="" class="nav-option personal">Personal Information</a>
              <a href="../../html/user-account/AddressPage.php" class="nav-option address">Addresses</a>
              <a href="../../html/user-account/PasswordPage.php" class="nav-option password">Password</a>
              <a href="../../html/user-account/PurchasePage.php" class="nav-option purchase">My Purchase</a>
              <a href="../login.php" class="nav-option logout">LOGOUT</a>
          </div>
      </article>

      <article class="account-details">
          <div class="section profile-overview">
              <h1>My Profile</h1>
              <p>Protect your account</p>
          </div>

          <div class="profile-form">
            <form action="" method="POST" class="form">
                <div class="form-group">
                      <label>Username</label>
                      <input type="text" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" class="input" name="username">
                </div>
                <div class="form-group">
                      <label>Name</label>
                      <input type="text" value="<?php echo htmlspecialchars($name); ?>" class="input" name="name">
                </div>
                <div class="form-group">
                      <label>Email</label>
                      <input type="email" value="<?php echo htmlspecialchars($maskedEmail); ?>" class="input" readonly>
                </div>
                <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="input" name="phone_number" placeholder="091234567">
                </div>

            <!-- Gender Section -->
              <h1 class="gender-title">Gender</h1>
              <div class="section gender-selection">
                  <div class="gender-options">
                      <div class="gender-option">
                          <input type="radio" name="gender" id="male" class="radio" style="height:20px; width:20px;" value="male" <?php if ($gender == 'male') echo 'checked'; ?>>
                          <label for="male">Male</label>
                      </div>
                      <div class="gender-option">
                          <input type="radio" name="gender" id="female" class="radio" style="height:20px; width:20px;" value="female" <?php if ($gender == 'female') echo 'checked'; ?>>
                          <label for="female">Female</label>
                      </div>
                  </div>
              </div>

              <!-- Date of Birth Section -->
               <h1 class="date-of-birth-title">Date of Birth</h1>
              <div class="section date-of-birth">
                  <div class="date-group">
                      <select id="day" name="day" class="custom-arrow" required>
                          <option value="" disabled selected>Day</option>
                          <?php 
                              $dobArray = explode("-", $dob); 
                              $storedDay = isset($dobArray[2]) ? $dobArray[2] : '';
                              for ($i = 1; $i <= 31; $i++) {
                                  echo "<option value='$i' " . ($i == $storedDay ? 'selected' : '') . ">$i</option>";
                              }
                          ?>
                      </select>
                  </div>
                  <div class="date-group">
                      <select id="month" name="month" class="custom-arrow" required>
                          <option value="" disabled selected>Month</option>
                          <?php 
                              $storedMonth = isset($dobArray[1]) ? $dobArray[1] : '';
                              $months = [
                                  "1" => "January", "2" => "February", "3" => "March", "4" => "April", "5" => "May", "6" => "June",
                                  "7" => "July", "8" => "August", "9" => "September", "10" => "October", "11" => "November", "12" => "December"
                              ];
                              foreach ($months as $key => $month) {
                                  echo "<option value='$key' " . ($key == $storedMonth ? 'selected' : '') . ">$month</option>";
                              }
                          ?>
                      </select>
                  </div>
                  <div class="date-group">
                      <select id="year" name="year" class="custom-arrow" required>
                          <option value="" disabled selected>Year</option>
                          <?php 
                              $storedYear = isset($dobArray[0]) ? $dobArray[0] : '';
                              $currentYear = date("Y");
                              for ($i = $currentYear; $i >= 1900; $i--) {
                                  echo "<option value='$i' " . ($i == $storedYear ? 'selected' : '') . ">$i</option>";
                              }
                          ?>
                      </select>
                  </div>
              </div>
              <div class="section save-changes">
                  <button type="submit" class="save-btn">Save Changes</button>
              </div>
            </form>
          </div>
      </article>

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
          <a href="" class="nav-option personal">Personal Information</a>
          <a href="/html/user-account/AddressPage.html" class="nav-option address">Addresses</a>
          <a href="/html/user-account/PasswordPage.html" class="nav-option password">Password</a>
          <a href="/html/user-account/PurchasePage.html" class="nav-option purchase">My Purchase</a>
          
          <div class="sidebar-logout-container">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#313A5E">
              <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
            </svg>
            <a href="" class="nav-option sidebar-logout">
              Log out       
            </a>
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

</script>
</html>