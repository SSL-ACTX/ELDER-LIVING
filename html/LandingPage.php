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
  <title>Elder Living | Landing Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/LandingPage.css">
  <link rel="stylesheet" href="../javascript/LandingPage.js">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
      <header class="header">
          <h1 class="logo"> 
              Elder Living
          </h1>
          <div class="search-container">
              <input 
                  type="search" 
                  class="search-input" 
                  placeholder="Search for products...." 
                  name="search"
                  oninput="filterProducts()"
              >
              <img 
                  src="../assets/search-icon.png" 
                  alt="Search Icon" 
                  class="search-icon" 
              >
              <div class="drop" id="productDropdown"></div>
          </div>

        <div class="user-cart-container">
          <div class="topnav">

            <div class="user">
                <img src="../assets/user.png" 
                    alt="User Icon" 
                    class="user-icon"
                >
                <a href="/html/Login.php" class="login_signup_link">
                    <?php echo ($username); ?>
                </a>
            </div>

            <div class="cart-icon-container">
                <div class="cart">
                    <a href="../html/CartPage.php" class="cart">
                        <img src="../assets/cart-icon.png" alt="" class="cart-icon">
                    </a>
                    <span class="cart-count">
                        0
                    </span>
                    <a href="#" 
                        class="cart_link">
                        Cart
                    </a>
                </div>

              <div class="cart-dropdown">
                  <div class="cart-items">
                      <p class="cart-empty">
                          No products yet
                      </p>
                      <p 
                        class="recently-added">
                      </p>
                    
                      <div class="cart-item">
                          <img src="your-image-url" alt="product-name" class="cart-item-image">
                          <div class="cart-item-details"></div>
                      </div>
                  </div>
                
                <div class="cart-footer">
                    <a href="../html/CartPage.php" class="view-cart">View Cart</a>
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
              <a class="nav-link" href="#">Home</a>
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
              <a class="nav-link" href="../html/CategoryPage.php">Categories</a>
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
              <a class="nav-link" href="../html/user-account/AccountPage.php">Account</a>
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="dropdown-icon" style="margin: 0.2rem 0 0 0.5rem;">
                  <path d="M14.25 6.375L9 11.625L3.75 6.375" stroke="#313A5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
                <ul class="account-submenu">
                    <li><a href="Login.php">Log In</a></li>
                    <li><a href="Signup.php">Sign up</a></li>
                    <li><a href="ForgotPassword.php">Forgot Password</a></li>
                    <li><a href="../html/user-account/AccountPage.php">My Account</a></li>
                    <li><a href="../Login.php">Logout</a></li>
                </ul>
          </li>
      </ul>
    </nav>
    <div class="navbar-border"></div>

    <div class="slider">
      <div class="wrapper">
        <img src="../assets/slider2.png" alt="Image 2">
        <img src="../assets/slider1.png" alt="Image 1">
        <img src="../assets/slider2.png" alt="Image 2">
        <img src="../assets/slider1.png" alt="Image 1">
      </div>
    </div>
    
    <div id="cart-modal" class="modal">
      <div class="modal-content">
        <img src="../assets/checked.png" alt="">
        <p>Item successfully added to your cart!</p>
      </div>
    </div>

    <!-------------------------- START CATEGORY ------------------------->
    <section class="browse-category">
        <div class="browse-header">
            <h1 class="browse-title">
                BROWSE BY CATEGORY
            </h1>
            <a href="../html/CategoryPage.php" class="browse-link">
                View All
            </a>
        </div>
    
      <div class="category">
          <!-- Adaptive kitchen tools -->
          <a href="../html/categories-page/adaptive-kitchen-tools.php" style="text-decoration: none;">
            <div class="category-item">
                <img src="../assets/adaptive.png" alt="Adaptive Kitchen Tools" class="category-image">
                <h2 class="category-text">Adaptive Kitchen Tools</h2>
            </div>
          </a>

          <!-- Bedroom / Bathroom -->
          <a href="../html/categories-page/bedroom-bathroom.php" style="text-decoration: none;">
            <div class="category-item">
                <img src="../assets/bedroom/bedroom.png" alt="Bedroom / Bathroom" class="category-image">
                <h2 class="category-text">Bedroom / Bathroom</h2>
            </div>
          </a>
    
          <!-- Core Products -->
          <a href="../html/categories-page/core-products.php" style="text-decoration: none;">
            <div class="category-item">
                <img src="../assets/core-products.png" alt="Adaptive Kitchen Tools" class="category-image">
                <h2 class="category-text">Core Products</h2>
            </div>
          </a>
    
          <!-- Daily Living Aids -->
          <a href="../html/categories-page/daily-living-aids.php" style="text-decoration: none;">
            <div class="category-item">
                <img src="../assets/daily-living-aids.png" alt="Adaptive Kitchen Tools" class="category-image">
                <h2 class="category-text">Daily Living Aids</h2>
            </div>
          </a>
    
          <!-- Emergency Medical -->
          <a href="../html/categories-page/emergency-medical.php" style="text-decoration: none;">
            <div class="category-item">
                <img src="../assets/emergency-medical.png" alt="Adaptive Kitchen Tools" class="category-image">
                <h2 class="category-text">Emergency Medical</h2>
            </div>
          </a>
      </div>
    </section>
    <!--------------------------- END CATEGORY -------------------------->

    <div class="graphics">
        <div class="graphic">
            <div class="graphics-border">
                <h1 class="graphics-text">
                    Home Safety &<br>
                    Accessibility
                </h1>
                <button class="buy-btn">
                    Shop Now
                </button>
            </div>
            <img 
                class="graphics-image" 
                src="../assets/LandingPageGraphics3.png" 
                alt="Home Safety & Accessibility"
            >
        </div>

        <div class="graphic">
            <h1 class="graphics-text">
                Home Safety &<br>
                Accessibility
            </h1>
            <button class="buy-btn">
                Shop Now
            </button>
            <img 
                class="graphics-image" 
                src="../assets/LandingPageGraphics3.png" 
                alt="Home Safety & Accessibility"
            >
        </div>
      </div>
    
    <!----------------------- START POPULAR PRODUCTS -------------------->
    <section class="popular_products_container">
        <article class="products_header_link">
            <h1 class="products-title">POPULAR PRODUCTS</h1>
            <a href="../html/PopularProductPage.php" class="product_link">View All</a>
        </article>

        <div class="products_container" id="products-container">
            <!-- dynamically updates  here -->
        </div>
    </section>
    <!------------------------ END POPULAR PRODUCTS --------------------->
      
    <!----------------------- START DAILY ESSENTIALS -------------------->
    <section class="daily-essentials">
      <div class="essentials-header">
        <h1 class="essentials-title">DAILY ESSENTIALS</h1>
      </div>

      <div class="essentials" id="essentials-container">
          <!-- dynamically updates  here -->
      </div>

      <div class="view-more">
        <button class="view-more-btn" onclick="viewMore()">See More</button>
      </div>
    </section>
    <!--------------------------- END VIEW MMORE ------------------------>

    <div class="features">
        <article class="payment">
              <img src="../assets/pay-icon.png" alt="" class="payment-icon">
              <h1 class="payment-title">
                Inclusive Payments
            </h1>
            <p class="payment-paragraph">
                Enjoy a secure and easy-to-use <br> 
                payment methods.
            </p>
        </article>
  
        <article class="informative">
            <img src="../assets/info-icon.png" alt="" class="info-icon">
              <h1 class="info-title">
                  Informative Resources
              </h1>
              <p class="informative-paragraph">
                  Access helpful articles and guides to <br> 
                  make informed decisions.
              </p>
        </article>
  
        <article class="time">
            <img src="../assets/time-icon.png" alt="" class="time-icon">
              <h1 class="time-title">
                  Time - Saving
              </h1>
              <p class="time-paragraph">
                  Effortless navigation and personalized <br> 
                  recommendations to save time.
              </p>
        </article>
    </div>
  </main>
  <footer class="site-footer">
    <div class="footer-content">
      <div class="footer-section categories">
        <h2 class="section-title">Categories</h2>
        <div class="category-lists">
          <div class="category-group one">
            <a href="#" class="category-label">Adaptive Kitchen Tools</a>
            <a href="#" class="category-label">Bedroom / Bathroom</a>
            <a href="#" class="category-label">Core Products</a>
            <a href="#" class="category-label">Daily Living Aids</a>
            <a href="#" class="category-label">Emergency Medical Alarms</a>
            <a href="#" class="category-label">First-Aid Kits</a>
            <a href="#" class="category-label">Grab Bars and Handrails</a>
            <a href="#" class="category-label">Home Safety and Comfort</a>
            <a href="#" class="category-label">Kitchen Aids</a>
            <a href="#" class="category-label">Lighting Aids</a>
          </div>
          <div class="category-group two">
            <a href="#" class="category-label">Mobility Aids</a>
            <a href="#" class="category-label">Nutritional Supplements</a>
            <a href="#" class="category-label">Orthopaedic Supports</a>
            <a href="#" class="category-label">Personal Care Products</a>
            <a href="#" class="category-label">Reachers and Grabbers</a>
            <a href="#" class="category-label">Shower Chairs and Bath Seats</a>
            <a href="#" class="category-label">Wheelchair Products</a>
            <a href="#" class="category-label">Xerostomia Products</a>
            <a href="#" class="category-label">Zipper Pulls</a>
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

  function viewMore() {
    const view = document.getElementById("viewMoreEssentials");
    view.click(); view.style.display = "block";
    view.style.display = "flex";
  }

  const products = [
    { id: 1, name: "809 Standard Wheelchair" },
    { id: 2, name: "Wrist Blood Pressure Monitor" },
    { id: 3, name: "Moisturizing Body Wash" },
    { id: 4, name: "32-Inch Reacher Grabber Tool" },
    { id: 5, name: "Adjustable Shower Chair" },
    { id: 6, name: "4 Wheel Mobility Scooter" },
    { id: 7, name: "Centrum Adults" },
    { id: 8, name: "Silicone Bandages" },
  ];

  function filterProducts() {
    const input = document.querySelector('.search-input').value.toLowerCase();
    const dropdown = document.getElementById('productDropdown');
    dropdown.innerHTML = ''; 

    if (input) {
      const filteredProducts = products.filter(product =>
        product.name.toLowerCase().includes(input)
      );

      if (filteredProducts.length > 0) {
        dropdown.style.display = 'block';
        filteredProducts.forEach(product => {
          const item = document.createElement('div');
          item.className = 'dropdown-item';
          item.textContent = product.name;
          item.onclick = () => selectProduct(product);
          dropdown.appendChild(item);
        });
      } else {
        dropdown.style.display = 'none';
      }
    } else {
      dropdown.style.display = 'none';
    }
  }
  function selectProduct(product) {
    const input = document.querySelector('.search-input');
    input.value = product.name;
    document.getElementById('productDropdown').style.display = 'none';
  }

  // start of cart function //
  window.addEventListener('load', () => {
    updateCartCount();
    updateCartDropdown();
  });

  document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
      const productId = button.dataset.productId;
      const productName = button.dataset.productName;
      const productPrice = parseFloat(button.dataset.productPrice);
      const productImage = button.closest('.wrap').previousElementSibling.querySelector('.products_image').src;

      const cartItem = {
        id: productId,
        name: productName,
        price: productPrice,
        image: productImage,
        quantity: 1
      };

      let cart = JSON.parse(localStorage.getItem('cart')) || [];

      const existingItem = cart.find(item => item.id === productId);
      if (existingItem) {
        existingItem.quantity += 1;
      } else {
        cart.push(cartItem);
      }

      localStorage.setItem('cart', JSON.stringify(cart));
      
      updateCartCount();
      updateCartDropdown();
      showModal();
    });
  });

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

  function showModal() {
    const modal = document.getElementById('cart-modal');
    modal.style.display = 'flex';

    setTimeout(() => {
      modal.style.display = 'none'; 
    }, 3000);
  }

  </script>

// fetch popular products
<script>
fetch('./fetchPop.php')
  .then(response => response.json())
  .then(products => {
    const container = document.getElementById('products-container');

    container.innerHTML = '';

    products.forEach(product => {
      console.log("Popular Products fetched successfully!");

      const productElement = document.createElement('article');
      productElement.classList.add('products');

      const productLink = document.createElement('a');
      productLink.href = product.productDetailsPage;

      const productItem = document.createElement('div');
      productItem.classList.add('products_item');

      const productImage = document.createElement('img');
      productImage.src = product.productImage;
      productImage.alt = product.productName;
      productImage.classList.add('products_image');

      productItem.appendChild(productImage);
      productLink.appendChild(productItem);

      const wrap = document.createElement('div');
      wrap.classList.add('wrap');

      const productName = document.createElement('h1');
      productName.classList.add('products_details');
      productName.innerHTML = product.productName;

      const productPrice = document.createElement('p');
      productPrice.classList.add('products_price');
      productPrice.innerHTML = `₱ ${product.productPrice}`;

      const addToCartButton = document.createElement('button');
      addToCartButton.classList.add('add-to-cart');
      addToCartButton.setAttribute('data-product-id', product.productId);
      addToCartButton.setAttribute('data-product-name', product.productName);
      addToCartButton.setAttribute('data-product-price', product.productPrice);
      addToCartButton.innerHTML = `
          <svg viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M4.88651 16.5703C5.23809 16.5703 5.52385 16.8922 5.52385 17.2883C5.52385 17.6844 5.23809 18.0054 4.88651 18.0054C4.53493 18.0054 4.25 17.6844 4.25 17.2883C4.25 16.8922 4.53493 16.5703 4.88651 16.5703Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2623 16.5703C14.6139 16.5703 14.8997 16.8922 14.8997 17.2883C14.8997 17.6844 14.6139 18.0054 14.2623 18.0054C13.9108 18.0054 13.625 17.6844 13.625 17.2883C13.625 16.8922 13.9108 16.5703 14.2623 16.5703Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M1 1V1C2.02329 1.19967 2.78658 2.05914 2.86398 3.09885L3.5352 12.1145C3.60018 12.9928 4.25085 13.6672 5.03233 13.6672H14.1234C14.8699 13.6672 15.503 13.0491 15.6105 12.215L16.4012 6.05522C16.4986 5.29534 15.9763 4.6153 15.2956 4.6153H3.01116" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M10.4688 8.07812H12.779" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Add to Cart
      `;

      addToCartButton.addEventListener('click', () => {
        const cartItem = {
          id: product._id, // we'll use the extracted _id as the unique identifier
          name: product.productName,
          price: parseFloat(product.productPrice),
          image: product.productImage,
          quantity: 1
        };

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingItem = cart.find(item => item.id === product._id); // find by _id?
        if (existingItem) {
          existingItem.quantity += 1;
        } else {
          cart.push(cartItem);
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        updateCartDropdown();
        showModal();
      });

      wrap.appendChild(productName);
      wrap.appendChild(productPrice);
      wrap.appendChild(addToCartButton);

      productElement.appendChild(productLink);
      productElement.appendChild(wrap);

      container.appendChild(productElement);
    });
  })
  .catch(error => {
    console.error('Error fetching popular products:', error);
  });

</script>

// fetch daily essentials
<script>
let page = 1; // tracker of the page number

function fetchAndAppendDailyEssentials(pageNumber) {
    fetch('./fetchDaily.php')
      .then(response => response.json())
      .then(products => {
        const container = document.getElementById('essentials-container');

        products.forEach(product => {
          console.log("Daily Essentials fetched successfully!");

          const productElement = document.createElement('div');
          productElement.classList.add('essentials_item');

          const imageContainer = document.createElement('div');
          imageContainer.classList.add('image-con');
          const productImage = document.createElement('img');
          productImage.src = product.productImage;
          productImage.alt = product.productName;
          productImage.classList.add('essentials_image');
          imageContainer.appendChild(productImage);
          productElement.appendChild(imageContainer);

          // Add to Cart Label
          const addToCartLabel = document.createElement('div');
          addToCartLabel.classList.add('add-to-cart-label');
          addToCartLabel.innerHTML = `
            <svg viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M4.88651 16.5703C5.23809 16.5703 5.52385 16.8922 5.52385 17.2883C5.52385 17.6844 5.23809 18.0054 4.88651 18.0054C4.53493 18.0054 4.25 17.6844 4.25 17.2883C4.25 16.8922 4.53493 16.5703 4.88651 16.5703Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2623 16.5703C14.6139 16.5703 14.8997 16.8922 14.8997 17.2883C14.8997 17.6844 14.6139 18.0054 14.2623 18.0054C13.9108 18.0054 13.625 17.6844 13.625 17.2883C13.625 16.8922 13.9108 16.5703 14.2623 16.5703Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M1 1V1C2.02329 1.19967 2.78658 2.05914 2.86398 3.09885L3.5352 12.1145C3.60018 12.9928 4.25085 13.6672 5.03233 13.6672H14.1234C14.8699 13.6672 15.503 13.0491 15.6105 12.215L16.4012 6.05522C16.4986 5.29534 15.9763 4.6153 15.2956 4.6153H3.01116" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M10.4688 8.07812H12.779" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h1>Add to Cart</h1>
          `;
          productElement.appendChild(addToCartLabel);

          const productDetails = document.createElement('div');
          productDetails.classList.add('product-details');
          const productName = document.createElement('h1');
          productName.classList.add('essentials_details');
          productName.textContent = product.productName;
          const productPrice = document.createElement('p');
          productPrice.classList.add('essentials_price');
          productPrice.textContent = `₱ ${product.productPrice}`;
          productDetails.appendChild(productName);
          productDetails.appendChild(productPrice);
          productElement.appendChild(productDetails);

          // add to cart listener
          addToCartLabel.addEventListener('click', () => {
            const cartItem = {
              id: product.productId, // changed from product._id to product.productId
              name: product.productName,
              price: parseFloat(product.productPrice),
              image: product.productImage,
              quantity: 1
            };

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingItem = cart.find(item => item.id === product.productId); // changed from product._id to product.productId
            if (existingItem) {
              existingItem.quantity += 1;
            } else {
              cart.push(cartItem);
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDropdown();
            showModal();
          });

          container.appendChild(productElement);
        });
      })
      .catch(error => {
        console.error('Error fetching daily essentials:', error);
      });
}

function viewMore() {
  page++; // increment
  fetchAndAppendDailyEssentials(page);
}

// initial load
fetchAndAppendDailyEssentials(page);
</script>


</body>
</html>
