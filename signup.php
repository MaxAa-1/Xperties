<?php
session_start();
$name     = $_SESSION['old']['name']     ?? '';
$username = $_SESSION['old']['username'] ?? '';
$email    = $_SESSION['old']['email']    ?? '';
$secure_phrase = $_SESSION['old']['secure_phrase'] ?? '';  // ← added
$bio      = $_SESSION['old']['bio']      ?? '';
$errors   = $_SESSION['errors']          ?? [];
unset($_SESSION['old'], $_SESSION['errors']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Xperties | Sign Up</title>
    <!-- Load shared site styles for header/footer -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Signup-specific overrides -->
    <link rel="stylesheet" href="css/signup.css" />
    <link rel="icon" href="images/favicon.ico" />
    <script defer src="js/signup.js"></script>
</head>

<body>

    <!-- NAVBAR (copied from index.php) -->
    <header class="navbar">
        <div class="container nav-container">
            <div class="logo-group">
                <img src="images/logo.png" alt="Xperties Logo" class="logo-img">
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#features">Features</a></li>
                    <li><a href="login.php" class="login-btn">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- SIGNUP FORM -->
    <div class="signup-container">
        <form action="process_signup.php" method="POST" class="signup-form">
            <h2>Create Your Xperties Account</h2>

            <!-- Full Name -->
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required />
            <?php if (!empty($errors['name'])): ?>
            <div class="alert-box">
                <span><?= $errors['name'] ?></span>
                <button class="close-alert" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            <?php endif; ?>

            <!-- Username -->
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required />
            <?php if (!empty($errors['username'])): ?>
            <div class="alert-box">
                <span><?= $errors['username'] ?></span>
                <button class="close-alert" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            <?php endif; ?>

            <!-- Email -->
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required />
            <?php if (!empty($errors['email'])): ?>
            <div class="alert-box">
                <span><?= $errors['email'] ?></span>
                <button class="close-alert" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            <?php endif; ?>

            <!-- Password -->
            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" required />
                <span class="toggle-password" onclick="togglePassword()">🔒</span>
            </div>
            <?php if (!empty($errors['password'])): ?>
            <div class="alert-box">
                <span><?= $errors['password'] ?></span>
                <button class="close-alert" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            <?php endif; ?>

            <!-- Secure Phrase (exact duplicate of Password wrapper) -->
            <label for="secure_phrase">Secure Phrase</label>
            <input type="text" id="secure_phrase" name="secure_phrase" autocomplete="off"
                value="<?= htmlspecialchars($secure_phrase) ?>" required />
            <?php if (!empty($errors['secure_phrase'])): ?>
            <div class="alert-box">
                <span><?= $errors['secure_phrase'] ?></span>
                <button class="close-alert" onclick="this.parentElement.style.display='none'">×</button>
            </div>
            <?php endif; ?>

            <!-- Bio -->
            <label for="bio">About Yourself (e.g. Job Description)</label>
            <textarea id="bio" name="bio"
                placeholder="Tell us about yourself..."><?= htmlspecialchars($bio) ?></textarea>

            <!-- Submit -->
            <button type="submit" class="submit-btn">Sign Up</button>

            <p class="login-link">Already have an account? <a href="login.php">Login here!</a></p>
        </form>
    </div>

    <!-- FOOTER (copied from index.php) -->
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