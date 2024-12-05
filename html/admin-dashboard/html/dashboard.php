<?php
require '../../../connection/connection.php';
session_start();

if(!isset($_SESSION['adminUsername'])){
  header("Location: ./admin-login.php");
  exit();
}

$adminUsername = $_SESSION['adminUsername'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="/html/admin-dashboard/css/dashboard.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&family=Zain:ital,wght@0,200;0,300;0,400;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
</head>
<body>
  <main class="main">
        <nav class="sidebar" role="navigation">
            <div class="sidebar-content">
                <div class="logo">
                    <img
                        class="brand-logo"
                        src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/f7d2112eaa2e7f6d3aa3a4b854d55e7b911381857729c89694235bbd63643f04?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&"
                        alt="ElderLiving Logo"
                    />
                    <h1 class="brand-title">Elder<span class="brand-name">Living</span></h1>
                </div>

                <a href="#" class="nav-item" role="menuitem">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5f0adb2d3219b58674d0ba7f4ad997583266b0f6d95b2279b493dd9b64f2f690?placeholderIfAbsent=true&apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a" alt="Dashboard icon" class="nav-icon" />
                    <span class="nav-text">Dashboard</span>
                </a>

                <a href="/html/admin-dashboard/html/dashboard-product.php" class="products-wrapper" role="menuitem">
                    <div class="icon-stack">
                        <img src="/assets/shopping-cart.png" alt="Products icon" class="icon-overlay" />
                    </div>
                    <span class="nav-text">Products</span>
                </a>

                <a href="/html/admin-dashboard/html/dashboard-categories.php" class="nav-section" role="menuitem">
                    <img src="/assets/category.png" alt="Categories icon" class="section-icon" />
                    <span class="nav-text">Categories</span>
                </a>

                <a href="/html/admin-dashboard/html/dashboard-orders.php" class="nav-section" role="menuitem">
                    <img src="/assets/shopping-bag.png" alt="Orders icon" class="section-icon" />
                    <span class="nav-text">Orders</span>
                </a>

                <a href="/html/admin-dashboard/html/dashboard-customers.php" class="nav-section" role="menuitem">
                    <img src="/assets/dashcustomer.png" alt="Customers icon" class="section-icon" />
                    <span class="nav-text">Customers</span>
                </a>

                <a href="/html/admin-dashboard/html/dashboard-reviews.php" class="nav-section" role="menuitem">
                    <img src="/assets/dashreview.png" alt="Reviews icon" class="section-icon" />
                    <span class="nav-text">Reviews</span>
                </a>

                <hr class="divider"/>
                <h2 class="section-title">Other</h2>

                <a href="./admin-logout.php" class="logout-wrapper" tabindex="0" style="cursor: pointer;">
                    <img src="/assets/logout.png" alt="Logout icon" class="section-icon"/>
                    <span class="logout-text">Logout</span>
                </a>
            </div>
        </nav>
        <header class="dashboard-header">
          <!-- HEADER FLEX --> <!-- HEADER FLEX --> <!-- HEADER FLEX -->
            <div class="header-flex">
                <h1 class="page-title">
                    Welcome to Dashboard!
                </h1>
                <nav class="header-controls">
                    <div class="search-controls">
                        <div class="search-box" role="search">
                              <div class="search-container">
                                <input
                                    type="search"
                                    class="search-input"
                                    placeholder="Search"
                                    name="search"
                                    oninput="filterProducts()"
                                >
                                <img
                                    src="../../../assets/search-icon.png"
                                    alt="Search Icon"
                                    class="search-icon"
                                >
                                <div class="drop" id="productDropdown"></div>
                            </div>
                        </div>
                      <img
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/3f4efce11d7472b0abf9dc754a96b767cda8e2b08eb61e2bbbf3e386b4820213?placeholderIfAbsent=true&apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a"
                          class="notification-icon"
                          alt="Notifications"
                      />
                      <div class="divider-vertical" aria-hidden="true"></div>
                    </div>
                    <div class="user-profile">
                        <img
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/a0e0774412aa6579b82c2f3d4d7280fd1eaec1a797dd94632faf96e29b0c84fc?placeholderIfAbsent=true&apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a"
                            class="profile-image"
                            alt="Profile picture of <?php echo htmlspecialchars($adminUsername); ?>"
                        />
                        <div class="role">
                            <span class="user-name"><?php echo htmlspecialchars($adminUsername); ?> <br><b>Admin</b></span>
                        </div>
                    </div>
                </nav>
            </div>
          <!-- HEADER FLEX --> <!-- HEADER FLEX --> <!-- HEADER FLEX -->

          <!-- STATS CONTAINER --> <!-- STATS CONTAINER --> <!-- STATS CONTAINER -->
          <section class="stats-container">
                <article class="stats-card">
                    <div class="stats-content">
                        <h2 class="stats-title">Earnings</h2>
                        <p class="stats-value">₱ 500,000</p>
                        <p class="stats-subtitle">Monthly Revenue</p>
                    </div>
                    <div class="stats-image">
                        <img src="/assets/earnings.png">
                    </div>
                </article>

                <article class="stats-card">
                    <div class="stats-content">
                        <h2 class="stats-title">Orders</h2>
                        <p class="stats-value">1,200</p>
                        <p class="stats-subtitle">Sales</p>
                    </div>
                    <div class="stats-image">
                        <img src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/c72cbc6bf6ea363a735db6ff9e21f0fdac41d4b777b5fd13412f0b731a8b141f?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&" alt="Orders statistics icon" class="orders-icon">
                    </div>
                </article>

              <article class="stats-card">
                  <div class="stats-content">
                      <h2 class="stats-title">Customer</h2>
                      <p class="stats-value">500</p>
                      <p class="stats-subtitle">+2 in one day!</p>
                  </div>
                  <div class="stats-image">
                      <img src="/assets/customers.png">
                  </div>
              </article>
          </section>
          <!-- STATS CONTAINER --> <!-- STATS CONTAINER --> <!-- STATS CONTAINER -->

          <!-- REVENUE CHART --> <!-- REVENUE CHART --> <!-- REVENUE CHART -->
          <section class="revenue-chart">
            <div class="chart-container">
              <div class="chart-wrapper">
                <h2 class="chart-title">
                  Monthly Revenue<br>2024
                </h2>
                <div class="bar-chart">
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Jan</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Feb</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Mar</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Apr</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">May</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Jun</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Jul</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Aug</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Sep</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Oct</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Nov</span>
                  </div>
                  <div class="month-column">
                    <div class="bar"></div>
                    <span class="month-label">Dec</span>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- REVENUE CHART --> <!-- REVENUE CHART --> <!-- REVENUE CHART -->

          <!-- TABLE CONTAINER --> <!-- TABLE CONTAINER --> <!-- TABLE CONTAINER -->
          <section class="orders-container">
              <article class="orders-card">
                  <h2 class="orders-title">
                      Recent Orders
                  </h2>
                  <header class="orders-header">
                      <span>Product Id</span>
                      <span class="product-name">Product Name</span>
                      <span class="order-date">Order Date</span>
                      <span>Price</span>
                      <span>Status</span>
                  </header>
                  <div class="orders-content">
                      <div class="order-details">
                          <div class="order-numbers"></div>
                          <div class="product-list"></div>
                          <div class="date-list"></div>
                          <div class="price-list"></div>
                          <div class="status-list"></div>
                      </div>
                  </div>
              </article>
          </section>
          <!-- TABLE CONTAINER --> <!-- TABLE CONTAINER --> <!-- TABLE CONTAINER -->
        </header>
  </main>

<script src="../js/dashboard.js"></script>
<script src="../js/aggregator.js"></script>

</body>
</html>
