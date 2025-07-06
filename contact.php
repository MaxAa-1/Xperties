<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us | Xperties</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.css"> <!-- For header/footer consistency -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

    <!-- HEADER -->
    <header class="navbar">
        <div class="nav-container container">
            <a href="index.php"><img src="images/logo.png" alt="Xperties Logo" class="logo-img"></a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="dashboard.php" class="login-btn">Dashboard</a></li>
            </ul>
        </div>
    </header>

    <!-- ALERT BOX -->
    <div id="alert-box" class="alert-box" style="display: none;">
        <span id="alert-message"></span>
        <button id="alert-close" onclick="document.getElementById('alert-box').style.display='none'">✖</button>
    </div>

    <!-- CONTACT SECTION -->
    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-info">
                <h2>We are here to help!</h2>
                <p>Let us know how we can best serve you. Use the contact form to email us.<br>
                    It's an honor to support you in your freelance journey.</p>
            </div>

            <div class="contact-form">
                <form id="contactForm" method="POST" action="process_contact.php"
                    onsubmit="return validateContactForm();">
                    <input type="text" name="name" id="name" placeholder="Username">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <textarea name="message" id="message" rows="5" placeholder="Message"></textarea>
                    <button type="submit" class="send-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-flex">
            <img src="images/logo.png" alt="Xperties Logo" class="footer-logo">
            <div class="footer-links">
                <a href="index.php">Home</a> |
                <a href="index.php#about">About</a> |
                <a href="contact.php">Contact us</a>
            </div>
            <p>© 2025 Xperties. All rights reserved.</p>
        </div>
    </footer>

    <!-- JS -->
    <script>
    const isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;
    const loggedEmail = "<?php echo addslashes($_SESSION['email'] ?? ''); ?>";
    const loggedUsername = "<?php echo addslashes($_SESSION['username'] ?? ''); ?>";
    </script>
    <script src="js/contact.js"></script>

</body>

</html>