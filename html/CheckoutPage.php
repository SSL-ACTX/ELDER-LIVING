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
  <title>Checkout Page</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="../css/CheckoutPage.css">
  <link rel="stylesheet" href="../javascript/LandingPage.js">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
  <!-- paypal js sdk -->
  <script src="https://www.sandbox.paypal.com/sdk/js?client-id=AZcxaFroRraqgAuYA5WFmcpkmluK7KxgDMnbgT3-KnWaajM2Vf8CrHHGkDf1GT7baLp218O7lfx2ho1G&currency=PHP"></script>
</head>
<body>
  <main class="container">
    <header class="header">
      <div class="logo-container">
          <a href="../html/LandingPage.php" class="logo"> 
              Elder Living
          </a>
          <a href="#" class="vertical-line"></a>
          <a href="#" class="checkout"> 
              Checkout
          </a>  
      </div>
     
      <div class="user-cart-container">
        <div class="topnav">
          <div class="user">
            <img src="../assets/user.png" alt="User Icon" class="user-icon">
            <a href="../html/Login.php" class="login_signup_link">
                <?php echo ($username); ?>
            </a>
          </div>
        </div>
      </div>
    </header>
    <div class="navbar-border"></div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../html/LandingPage.php">Home</a></li>
        <li class="breadcrumb-item"><a href="../html/categories-page/wheelchair-products.php">Wheelchair Products</a></li>
        <li class="breadcrumb-item"><a href="../html/ProductsDetailsPage/Wheelchair-Details.php">809 Standard Wheelchair</a></li>
        <li class="breadcrumb-item"><a href="../html/CartPage.php">Cart</a></li>
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
      </ol>
    </nav>

      <div class="checkout-items-container">
        <article class="checkout-item">
            <div class="checkout-labels">
              <h1>
                Delivery Address
              </h1>

              <div class="checkout-input">
                <div class="info">
                  <input type="text" placeholder="Enter Full Name" name="full-name">
                  <input type="text" placeholder="Enter Phone Number" name="phone-number">
                </div>
                <div class="details">
                  <input type="text" placeholder="Street Name, Building, House No." name="address">
                  <input type="text" placeholder="Province, Region, City " name="provRegCity">
                  <input type="text" placeholder="Postal Code" name="postal-code">
                </div>

               <div class="payment">
                 <h1>Payment Methods</h1>
                 <div class="payment-input">
                   <div class="payment-label">
                     <div class="payment-option">
                      <input type="radio" name="payment" class="radio" id="paypal" style="height:20px; width:20px; box-shadow: none;">
                       <label for="paypal"></label>
                       <img src="../assets/paypal.png" alt="">
                     </div>
                     <div class="payment-option paypal-option">
                       <div id="paypal-button-container" style="display:none;"></div> <!-- PayPal button will go here -->
                     </div>
                   </div>
                   <div class="payment-label">
                    <div class="payment-option">
                        <input type="radio" name="payment" class="radio" id="cash" style="height:20px; width:20px; box-shadow: none;" checked>
                        <label for="cash">Cash on delivery</label>
                      </div>
                   </div>

                   <div class="checkout-btn">
                     <button id="place-order-btn" onclick="placeOrder()">PLACE ORDER</button>
                   </div>

                 </div>
               </div>

              </div>
            </div>
        </article>

        <article class="summary-section">
            <div class="summary-container">
                <h1>
                  Products Ordered
                </h1>
                <div class="summary-item">
                  <div class="summary-details">
                    <div class="summary-product">
                      <img src="../assets/standard-wheelchair.png" alt="Standard Wheelchair" class="summary-image">
                    </div>
                    <div class="summary-info">
                      <p class="summary-name">809 Standard <br> Wheelchair</p>
                      <p class="total-quantity">x3</p>
                      <p class="total-price">₱ 4,000</p>
                    </div>
                  </div>
                </div>
                <div class="sub-total">
                  <p class="sub-total-price"></p>
                </div>
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
        <img src="../assets/paypal.png" alt="PayPal" class="payment-image">
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

const cart = JSON.parse(localStorage.getItem('cart')) || [];

function displayCheckoutItems() {
  const summaryContainer = document.querySelector('.summary-item');

  if (cart.length === 0) {
    summaryContainer.innerHTML = '<p class="empty-cart-message">No items in your order.</p>';
    return;
  }

  summaryContainer.innerHTML = '';

  let subTotal = 0;

  cart.forEach(item => {
    const formattedPrice = `₱ ${item.price.toLocaleString()}`;
    const totalPrice = item.price * item.quantity;
    subTotal += totalPrice;

    const itemElement = document.createElement('div');
    itemElement.className = 'summary-details';
    itemElement.innerHTML = `
      <div class="summary-product">
        <img src="${item.image}" alt="${item.name}" class="summary-image">
        <p class="summary-name">${item.name}</p>
      </div>
      <div class="summary-info">
        <p class="total-quantity">x${item.quantity}</p>
        <p class="total-price">₱ ${totalPrice.toLocaleString()}</p>
      </div>
    `;
    summaryContainer.appendChild(itemElement);
  });

  const subTotalElement = document.createElement('div');
  subTotalElement.className = 'subtotal-container';
  subTotalElement.innerHTML = `
    <div class="subtotal">
      <p class="subtotal-label">Total Payment:</p>
      <p class="subtotal-value">₱ ${subTotal.toLocaleString()}</p>
    </div>
  `;

  const container = document.querySelector('.summary-container');
  container.appendChild(subTotalElement);
}

displayCheckoutItems();
</script>

//paypal configs
<script>
document.addEventListener('DOMContentLoaded', function () {
  const paypalRadioButton = document.getElementById('paypal');
  const cashRadioButton = document.getElementById('cash');
  const paypalButtonContainer = document.getElementById('paypal-button-container');
  const placeOrderButton = document.getElementById('place-order-btn');

  paypalRadioButton.addEventListener('change', function () {
    if (this.checked) {
      paypalButtonContainer.style.display = 'block';
    }
  });

  cashRadioButton.addEventListener('change', function () {
    if (this.checked) {
      paypalButtonContainer.style.display = 'none';
    }
  });

  paypal.Buttons({
    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: calculateTotalPrice()
          }
        }]
      });
    },
    onApprove: function (data, actions) {
      return actions.order.capture().then(function (details) {
        sendOrderToBackend(details, 'PayPal');
        clearLocalStorage();
      });
    },
    onError: function (err) {
      console.error('PayPal payment error:', err);
      alert('Payment failed. Please try again. :(');
    }
  }).render('#paypal-button-container');

  function calculateTotalPrice() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    return cart.reduce((total, item) => total + item.price * item.quantity, 0).toFixed(2);
  }

  window.placeOrder = function () {
    if (cashRadioButton.checked) {
      sendOrderToBackend(null, 'COD');
      clearLocalStorage();
    } else if (paypalRadioButton.checked) {
      alert("Processing PayPal Payment...");
    }
  };

  function sendOrderToBackend(paymentDetails, paymentMethod) {
    const cartData = JSON.stringify(JSON.parse(localStorage.getItem('cart')) || []);
    const fullName = document.querySelector('input[name="full-name"]').value;
    const phoneNumber = document.querySelector('input[name="phone-number"]').value;
    const address = document.querySelector('input[name="address"]').value;
    const provRegCity = document.querySelector('input[name="provRegCity"]').value;
    const postalCode = document.querySelector('input[name="postal-code"]').value;

    fetch('./saveOrder.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        username: "<?php echo $username; ?>",
        cart: cartData,
        paymentDetails: paymentDetails,
        paymentMethod: paymentMethod,
        totalPrice: calculateTotalPrice(),
        deliveryDetails: {
          fullName,
          phoneNumber,
          address,
          provRegCity,
          postalCode
        }
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        window.location.href = './user-account/PurchasePage.php';
      } else {
        alert('Failed to save the order');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  function clearLocalStorage() {
    localStorage.removeItem('cart'); // clear cart from localStorage
  }
});
</script>


</html>
