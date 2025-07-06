<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Xperties</title>
    <!-- Global styles for header/footer -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Login-specific overrides -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>

<body>

    <!-- NAVBAR (from index.php) -->
    <header class="navbar">
        <div class="container nav-container">
            <div class="logo-group">
                <img src="images/logo.png" alt="Xperties Logo" class="logo-img">
            </div>
            <nav>
                <ul class="nav-links">
                    <?php if (!empty($_SESSION['username'])): ?>
                    <!-- LOGGED IN: -->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#features">Features</a></li>
                    <li><a href="logout.php" class="login-btn">Log out</a></li>
                    <?php else: ?>
                    <!-- NOT LOGGED IN: -->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#features">Features</a></li>
                    <li><a href="signup.php" class="login-btn">Sign Up</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- LOGIN FORM -->
    <div class="login-container">
        <h2>Login to Xperties</h2>

        <?php
    // Show alert message if login failed
    if (isset($_SESSION['login_error'])) {
        echo '<div class="alert-box">';
        echo '<p>⚠️ ' . htmlspecialchars($_SESSION['login_error']) . '</p>';
        echo '<button class="alert-close" onclick="this.parentElement.style.display=\'none\'">×</button>';
        echo '</div>';
        unset($_SESSION['login_error']);
    }
    ?>

        <form
            action="process_login.php<?= isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : '' ?>"
            method="POST">

            <!-- Username -->
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required
                value="<?= isset($_COOKIE['remember_username']) ? htmlspecialchars($_COOKIE['remember_username']) : '' ?>">

            <!-- Email -->
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required
                value="<?= isset($_COOKIE['remember_email']) ? htmlspecialchars($_COOKIE['remember_email']) : '' ?>">

            <!-- Password -->
            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <span class="toggle-password" onclick="togglePassword()">🔒</span>
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember"
                    <?= isset($_COOKIE['remember_username']) ? 'checked' : '' ?>>
                <label for="remember">Remember Me</label>
            </div>

            <!-- Forgot Password (same style as the checkbox label) -->
            <div class="remember-me" style="margin-top:8px;">
                <a href="forgot_password.php" class="forgot-link">Forgot Password?</a>
            </div>

            <!-- Submit -->
            <button type="submit">Login</button>
        </form>

        <div class="form-footer">
            Don't have an account? <a href="signup.php">Sign Up</a>
        </div>
    </div>

    <script src="js/login.js"></script>

    <!-- FOOTER (from index.php) -->
    <footer>
        <div class="container footer-flex">
            <img src="images/logo.png" alt="Xperties Logo" class="footer-logo">
            <div class="footer-links">
                <a href="index.php">Home</a> |
                <a href="index.php#about">About</a> |
                <a href="contact.php">Contact us</a>
            </div>
            <div>&copy; 2025 Xperties. All rights reserved.</div>
        </div>
    </footer>

</body>

</html>