<?php
require '../../../connection/connection.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';

if (!isset($_SESSION['adminUsername'])) {
    header("Location: ./admin-login.php");
    exit();
}

$adminUsername = $_SESSION['adminUsername'];
$admin = $adminCollection->findOne(['adminUsername' => $adminUsername]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOtp = $_POST['otp'];

    if ($enteredOtp == $admin['otp']) {
        $adminCollection->updateOne(
            ['adminUsername' => $adminUsername],
            ['$set' => ['verified' => true, 'loginStatus' => true]]
        );
        header('Location: ./dashboard.php');
        exit;
    } else {
        $error = "Invalid OTP!";
    }
} else {
    $otp = rand(100000, 999999);

    $adminCollection->updateOne(
        ['adminUsername' => $adminUsername],
        ['$set' => ['otp' => $otp]]
    );

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'callixjeira@gmail.com';
        $mail->Password = 'tgao xjsr mzhp dzdn';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('callixjeira@gmail.com', 'ElderLiving Admin');
        $mail->addAddress($admin['email']);

        $mail->isHTML(true);
        $mail->Subject = 'Your Verification OTP';
        $mail->Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>OTP Verification</title>
            <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body style='font-family: Arial, sans-serif; background-color: #f4f4f4;'>
            <div class='container my-5'>
                <div class='row justify-content-center'>
                    <div class='col-md-6'>
                        <div class='card shadow-lg' style='border-radius: 10px; overflow: hidden;'>
                            <div class='card-body' style='background-color: #ffffff; padding: 30px;'>
                                <h4 class='card-title text-center text-primary'>OTP Verification</h4>
                                <p class='text-center text-muted'>Dear Admin,</p>
                                <p class='text-center'>
                                    Your verification OTP is:
                                   <h2 class='font-weight-bold text-danger mt-3 mb-3'>$otp</h2>
                                </p>
                                <p class='text-center text-muted'>Please enter this code on the verification page.</p>
                                <div class='text-center'>
                                    <a href='#' class='btn btn-primary btn-block' style='width: 100%;'>Enter OTP</a>
                                </div>
                                <p class='text-center text-muted mt-4' style='font-size: 12px;'>If you did not request this, please ignore this email.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js'></script>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
        </body>
        </html>
        ";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/elder-living-logo.png">
  <link rel="stylesheet" href="/html/admin-dashboard/css/verification.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tangerine:wght@400;700&family=Zain:ital,wght@0,200;0,300;0,400;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
</head>
<body>
  <section class="login-container">
        <div class="header-wrapper">
            <header class="brand-header">
                <img
                    class="brand-logo"
                    src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/f7d2112eaa2e7f6d3aa3a4b854d55e7b911381857729c89694235bbd63643f04?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&"
                    alt="ElderLiving Logo"
                />
                <h1 class="brand-name">ElderLiving</h1>
            </header>

            <main class="main-content">
                <div class="content-wrapper">
                    <section class="image-section">
                        <img
                            class="hero-image"
                            src="https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/afbbaf38f4c405aac3286a705cb7088f9fa802cc2f3392bb225c955704bf84bd?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&"
                            alt="Admin Verification Illustration"
                        />
                    </section>

                    <section class="form-section">
                        <form method="POST" class="login-form">
                            <h2 class="form-title">Enter Verification Code</h2>

                            <?php if (isset($error)): ?>
                                <div class="error-message"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <div class="input-wrapper">
                                <div class="input-container">
                                    <input type="text" id="otp" name="otp" placeholder="Enter Your OTP" required />
                                </div>
                            </div>

                            <button type="submit" class="submit-button">VERIFY CODE</button>
                        </form>
                    </section>
                </div>
            </main>
        </div>
  </section>
</body>
</html>
