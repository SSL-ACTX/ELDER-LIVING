<?php 

session_start();
require '../../connection/connection.php';

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
  <title>Wheelchair Details Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/elder-living-logo.png">
  <link rel="stylesheet" href="../../css/ProductDetailsPage/WheelchairDetailsPage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="container">
    <header class="header">
      <a href="../../html/LandingPage.php" class="logo"> 
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
            <a href="../../html/Login.php" class="login_signup_link">
                <?php echo ($username); ?>
            </a>
          </div>

          <div class="cart-icon-container">
            <div class="cart">
              <a href="../../html/CartPage.php" class="cart">
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
                <a href="../../html/CartPage.php" class="view-cart">View Cart</a>
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
                    <li><a href="../Login.php">Log In</a></li>
                    <li><a href="../Signup.php">Sign up</a></li>
                    <li><a href="../ForgotPassword.php">Forgot Password</a></li>
                    <li><a href="../../html/user-account/AccountPage.php">My Account</a></li>
                    <li><a href="../Login.php">Logout</a></li>
                </ul>
          </li>
      </ul>
    </nav>
    <div class="navbar-border"></div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../html/LandingPage.php">Home</a></li>
        <li class="breadcrumb-item"><a href="../../html/categories-page/shower-chairs-and-bath-seats.php">Shower Chairs with Backrest</a></li>
        <li class="breadcrumb-item active" aria-current="page">Commode Shower Chair</li>
      </ol>
    </nav>

    <div id="cart-modal" class="modal">
      <div class="modal-content">
        <img src="../../assets/checked.png" alt="">
        <p>Item successfully added to your cart!</p>
      </div>
    </div>

    <div class="product-container">
          <article class="product-image-container">
              <img src="../../assets/Commode_Shower_Chair.png" alt="Product Image" class="product-image" style="margin-top: 2rem;">
          </article>
          <article class="product-details-container">
              <p class="category">Shower Chairs with Backrest</p>
                <h1 class="product-name">
                    COMMODE SHOWER <br>
                    CHAIR
                </h1>
                <p class="product-price">
                    ₱ 2,200
                </p>
                <img src="../../assets/rate.png" alt="" class="rate-image">
                <p class="quantity">
                    Quantity  
                </p>
                <div class="quantity-container">
                    <button class="quantity-btn decrease" onclick="decreaseQuantity()">-</button>
                      <input type="number" class="quantity-input" id="quantity" value="1" min="1">
                    <button class="quantity-btn increase" onclick="increaseQuantity()">+</button>
                </div>

                <div class="product-buy-button">
                    <a href="../../html/CartPage.php" style="text-decoration: none;">
                      <!-- nasa button ang product data nila -->
                       <!-- note: unique dapat ang product id 
                            para hindi na re retrieve ang same
                            product kapag nag add to cart 
                      -->
                      <button class="buy-btn"
                              data-product-id="7" 
                              data-product-name="Commode Shower Chair" 
                              data-product-price="2200">>
                          Buy Now
                      </button>
                    </a>
                    <!-- nasa button ang product data nila -->
                       <!-- note: unique dapat ang product id 
                            para hindi na re retrieve ang same
                            product kapag nag add to cart 
                      -->
                    <!-- nasa button ang product data nila -->
                    <a href="#" style="text-decoration: none;">
                      <button class="add-to-cart-btn" 
                              data-product-id="7" 
                              data-product-name="Commode Shower Chair" 
                              data-product-price="2200">
                          Add to Cart 
                      </button>
                    </a>
                </div>
          </article>
    </div>

    <div class="product-reviews-container">
          <article class="product-description" onclick="toggleDescription()">
                <div class="desciprtion-title">
                    <h1>Product Information</h1>
                </div>
          </article>

          <article class="product-reviews" onclick="toggleReviews()">
                <div class="review-title">
                      <h1>Reviews</h1>
                </div>
          </article>
    </div>

    <article class="description-content" id="description">
          <p class="description-paragraph">
            <span class="prod-name">
              A versatile, dual-use chair designed for older adults, serving as both a
              shower seat and a portable commode with a removable pail. Made from rust-resistant
              aluminum, this lightweight chair offers easy mobility with four caster wheels and foldable
              footrests.
          </p>
          <p class="item-weight">
              Item Weight <span class="weight">: 7.5 kg</span>
          </p>
    </article>


    <article class="review-content" id="review">

          <div class="create-review-container">
              <h1 class="create-review-title">Create a Review</h1>
              <div class="create-review-content">
                  <h1 class="overall-review-title">Overall Rating</h1>
                  <div class="star-rating-content">
                      <span class="star" data-rating="1"></span>
                      <span class="star" data-rating="2"></span>
                      <span class="star" data-rating="3"></span>
                      <span class="star" data-rating="4"></span>
                      <span class="star" data-rating="5"></span>
                  </div>

                  <div class="create-review-input" style="display: flex; flex-direction: column;">
                      <label for="" class="create-review-label">Add a headline</label>
                      <input type="text" placeholder="Feature your review....." />
                  </div>

                  <div id="drop-area" class="drop-area">
                      <label for="" class="upload-label">
                          Add a photo or a video
                      </label>
                      <input type="file" id="file" multiple class="file-input" />
                      <label for="file" class="file-label">Upload files here</label>
                  </div>

                  <div class="write-review">
                      <label for="" class="create-review-label">Add a written review</label>
                      <textarea name="" id="" cols="30" rows="10" placeholder="Write your review....."></textarea>
                  </div>

                  <div class="submit">
                      <button type="submit">Submit Review</button>
                  </div>
              </div>
          </div>

    </article>
  </main>

  <footer class="site-footer">
    <div class="footer-content">
      <div class="footer-section categories">
        <h2 class="section-title">Categories</h2>
        <div class="category-lists">
          <div class="category-group one">
            <a href="/html/categories-page/adaptive-kitchen-tools.html" class="category-item">Adaptive Kitchen Tools</a>
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

const textElements = document.querySelectorAll('.description-title, .review-title');

function updateUnderline(activeElement) {
    textElements.forEach((text) => {
      text.classList.remove('active');
    });

    if (activeElement) {
      activeElement.classList.add('active');
    }
  }

function toggleReviews() {
  const reviewsContainer = document.getElementById('review');
  const productDescription = document.getElementById('description');
  const reviewTitle = document.querySelector('.review-title');
  const descriptionTitle = document.querySelector('.description-title');

  if (reviewsContainer.style.display === 'none' || reviewsContainer.style.display === '') {
    reviewsContainer.style.display = 'block';
    productDescription.style.display = 'none';
    updateUnderline(reviewTitle);
  } else {
     reviewsContainer.style.display = 'none';
    productDescription.style.display = 'block';
    updateUnderline(descriptionTitle);
  }
}

function toggleDescription() {
  const reviewsContainer = document.getElementById('review');
  const productDescription = document.getElementById('description');
  const descriptionTitle = document.querySelector('.description-title');
  const reviewTitle = document.querySelector('.review-title');

 if (productDescription.style.display === 'none' || productDescription.style.display === '') {
    productDescription.style.display = 'block';
    reviewsContainer.style.display = 'none';
    updateUnderline(descriptionTitle);
  } else {
    productDescription.style.display = 'none';
    reviewsContainer.style.display = 'block';
    updateUnderline(reviewTitle);
  }
}
document.getElementById('review').style.display = 'none';
document.getElementById('description').style.display = 'block';
updateUnderline(document.querySelector('.description-title'));


function increaseQuantity() {
  const quantityInput = document.getElementById('quantity');
  quantityInput.value = parseInt(quantityInput.value) + 1;
}

function decreaseQuantity() {
  const quantityInput = document.getElementById('quantity');
  if (parseInt(quantityInput.value) > 1) {
    quantityInput.value = parseInt(quantityInput.value) - 1;
  }
}

// kailangan ko nito para hindi 
// nawawala ang cart count
// kapag ni refresh ko ang browser
window.addEventListener('load', () => {
  updateCartCount();
  updateCartDropdown();
});

// add to cart button function to //
document.querySelectorAll('.add-to-cart-btn').forEach(button => {
  button.addEventListener('click', () => {
    const productId = button.dataset.productId;
    const productName = button.dataset.productName;
    const productPrice = parseFloat(button.dataset.productPrice);
    const productImage = button.closest('.product-container')
                               .querySelector('.product-image')?.src;

    if (!productId || !productName || !productPrice || !productImage) {
      console.error('Missing product data');
      return;
    }

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

// add to buy button function to //
// add to buy button function to //
document.querySelectorAll('.buy-btn').forEach(button => {
  button.addEventListener('click', () => {
    const productId = button.dataset.productId;
    const productName = button.dataset.productName;
    const productPrice = parseFloat(button.dataset.productPrice);
    const productImage = button.closest('.product-container')
                               .querySelector('.product-image')?.src;

    if (!productId || !productName || !productPrice || !productImage) {
      console.error('Missing product data');
      return;
    }

    const cartItem = {
      id: productId,
      name: productName,
      price: productPrice,
      image: productImage,
      quantity: 1
    };
   
    let cart = [cartItem];
    localStorage.setItem('cart', JSON.stringify(cart));
   
    window.location.href = '/html/CartPage.html';
  });
});

// cart count function to
// ina-update nito ang cart count
// pero mag sh-show lang siya kapag may laman ang cart
function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const totalUniqueItems = cart.length; 

  const cartCountElement = document.querySelector('.cart-count');
  cartCountElement.textContent = totalUniqueItems;
  cartCountElement.style.display = totalUniqueItems > 0 ? 'flex' : 'none'; 
}

// dropdown cart function
// kapag hinover ko ang cart button
// mag sh-show ang dropdown cart at
// lalabas ang items na nasa cart
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

// modal function to
// modal function to
// mag sho show siya ng 3 seconds and then mawawala
function showModal() {
  const modal = document.getElementById('cart-modal');
  modal.style.display = 'flex';

  setTimeout(() => {
    modal.style.display = 'none'; 
  }, 3000);
}




</script>

<script src="./submitReview.js"></script>

// reviews generator to, naka based nadin sa current page
<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('./getReviews.php')
        .then(response => response.json())
        .then(reviews => {
            const reviewContainer = document.getElementById('review');

            const reviewsSection = document.getElementById('reviews-section');
            reviewsSection.innerHTML = '';

            reviews.forEach(review => {
                const reviewHTML = `
                    <div class="customer-subcontent">
                        <div class="customer-profile">
                            <img src="../../assets/profile.png" alt="customer profile">
                            <div class="customer-info">
                                <p class="customer-name">${review.username}</p>
                                <p class="review-date">${formatDate(review.review_date)}</p>
                                <div class="star-rating">
                                    ${generateStars(review.rating)}
                                </div>
                                <p class="review-headline">${review.review_headline}</p>
                                <p class="customer-review">${review.customer_review}</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-image">
                        <img src="${review.image_url || '../../assets/default-product-image.png'}" alt="review image">
                    </div>
                `;
                reviewsSection.insertAdjacentHTML('afterbegin', reviewHTML);
            });
        })
        .catch(error => {
            console.error('Error fetching reviews:', error);
        });
});

function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString(undefined, options);
}

function generateStars(rating) {
    const starValue = Math.min(Math.max(rating, 1), 5);

    let starsHTML = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= starValue) {
            starsHTML += '<span class="star checked" data-rating="' + i + '"></span>';
        } else {
            starsHTML += '<span class="star" data-rating="' + i + '"></span>';
        }
    }
    return starsHTML;
}

</script>
</html>
