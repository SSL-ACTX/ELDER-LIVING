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
  <link rel="stylesheet" href="/html/admin-dashboard/css/dashboard-categories.css">
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
              
                <a href="/html/admin-dashboard/html/dashboard.php" class="nav-item" role="menuitem">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5f0adb2d3219b58674d0ba7f4ad997583266b0f6d95b2279b493dd9b64f2f690?placeholderIfAbsent=true&apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a" alt="Dashboard icon" class="nav-icon" />
                    <span class="nav-text">Dashboard</span>
                </a>
          
                <a href="/html/admin-dashboard/html/dashboard-product.php" class="products-wrapper" role="menuitem">
                    <div class="icon-stack">
                        <img src="/assets/shopping-cart.png" alt="Products icon" class="icon-overlay" />
                    </div>
                    <span class="nav-text">Products</span>
                </a>
            
                <a href="/html/admin-dashboard/html/dashboard-categories.php" class="nav-categories" role="menuitem">
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
            <div class="header-flex">
                <nav class="header-controls">
                    <article class="search-box" role="search">
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
                    </article>
                    <article class="admin-container">
                        <img
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/3f4efce11d7472b0abf9dc754a96b767cda8e2b08eb61e2bbbf3e386b4820213?placeholderIfAbsent=true&apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a"
                            class="notification-icon"
                            alt="Notifications"
                        />
                        <div class="divider-vertical" aria-hidden="true"></div>
                        <div class="user-profile">
                            <img
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/a0e0774412aa6579b82c2f3d4d7280fd1eaec1a797dd94632faf96e29b0c84fc?placeholderIfAbsent=true&apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a"
                                class="profile-image"
                                alt="Profile picture of <?php echo htmlspecialchars($adminUsername); ?>"
                            />
                            <div class="role">
                                <span class="user-name"><?php echo     htmlspecialchars($adminUsername); ?> <br><b>Admin</b></span>
                            </div>
                        </div>
                    </article>
                </nav> 
            </div> 
            <section class="product-section">
                <h1 class="product-list-title">
                    Category List
                </h1>
                <header class="header-container">
                    <nav class="breadcrumb">
                          Dashboard / <span class="breadcrumb-secondary">Categories</span>
                    </nav>
                </header>
              
                <!-- PRODUCTS CONTAINER -->
                <div class="products-container">
                    <header class="table-header">
                        <h2>Image</h2>
                        <h2>Category Name</h2>
                        <h2>Product Count</h2>
                    </header>
                    <!-- ... will be inserted dynamically here -->
                </div>


            </section>
        </header>
    </main>

    <script src="../js/fetchCat.js"></script>
</body>
</html>
