<?php
require '../../../connection/connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUsername = $_POST['adminUsername'];
    $password = $_POST['password'];

    $admin = $adminCollection->findOne(['adminUsername' => $adminUsername]);

    if ($admin) {
        if (password_verify($password, $admin['password'])) {
            $_SESSION['adminUsername'] = $adminUsername;

            if ($admin['verified'] === true || $admin['loginStatus'] === true) {
                header('Location: ./dashboard.php');
            } else {
                header('Location: ./verification.php');
            }
            exit;
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="/html/admin-dashboard/css/admin-login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&family=Zain:ital,wght@0,200;0,300;0,400;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
</head>
<body>
  <section class="login-container">
    <div class="header-wrapper">
      <header class="brand-header">
        <img class="brand-logo" src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/f7d2112eaa2e7f6d3aa3a4b854d55e7b911381857729c89694235bbd63643f04?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&" alt="ElderLiving Logo" />
        <h1 class="brand-name">ElderLiving</h1>
      </header>

      <main class="main-content">
        <div class="content-wrapper">
          <section class="image-section">
            <img class="hero-image" src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/afbbaf38f4c405aac3286a705cb7088f9fa802cc2f3392bb225c955704bf84bd?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&" alt="Admin Login Illustration" />
          </section>

          <section class="form-section">
            <form method="POST" class="login-form">
              <h2 class="form-title">Login as an Admin</h2>
              <?php if (isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
              <?php endif; ?>

              <div class="input-wrapper">
                <label for="username" class="visually-hidden">Enter Username</label>
                <div class="input-container">
                  <input type="text" id="adminUsername" name="adminUsername" placeholder="Enter Username" required />
                  <img class="input-icon" src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/897d469bf0734a4a7224cab545369166e65f1c1b81d574ee5d3d7ef85d23f931?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&" alt="user-icon" />
                </div>
              </div>

              <div class="input-wrapper">
                <label for="password" class="visually-hidden">Enter Password</label>
                <div class="input-container">
                  <input type="password" id="password" name="password" placeholder="Enter Password" required />
                  <img class="input-icon" src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/196f3b41c7af39e09184bd0adf3572046861d001b4f9289ec848d4983b9c1cd3?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&" alt="password-icon" />
                </div>
              </div>

              <button type="submit" class="submit-button">LOGIN</button>
              <a href="/html/admin-dashboard/html/forgot-password.html" class="forgot-link">Forgot password?</a>
            </form>
          </section>
        </div>
      </main>
    </div>
  </section>
</body>
</html>
