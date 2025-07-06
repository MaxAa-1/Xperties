<?php
session_start();

// 1) Persistent login: if cookies exist but session is empty, refill it
if (
    empty($_SESSION['username'])
 && isset($_COOKIE['remember_username'])
 && isset($_COOKIE['remember_email'])
) {
    $_SESSION['username'] = $_COOKIE['remember_username'];
    $_SESSION['email']    = $_COOKIE['remember_email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Xperties | Freelancer Productivity</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container nav-container">
            <div class="logo-group">
                <img src="images/logo.png" alt="Xperties Logo" class="logo-img">
            </div>
            <nav>
                <ul class="nav-links">
                    <?php if (!empty($_SESSION['username'])): ?>
                    <!-- LOGGED IN: -->
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="logout.php" class="login-btn">Logout</a></li>
                    <?php else: ?>
                    <!-- NOT LOGGED IN: -->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="login.php" class="login-btn">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="container hero-flex">
            <div class="hero-text animate-fadein-left">
                <h1>Why Join Xperties?</h1>
                <p>Everything you need to thrive as a freelancer, all in one place.</p>
                <ul class="intro-features">
                    <li><i class="fas fa-tasks"></i> Organize your tasks effortlessly</li>
                    <li><i class="fas fa-users"></i> Collaborate with teammates in real time</li>
                    <li><i class="fas fa-chart-line"></i> Track your productivity & growth</li>
                    <li><i class="fas fa-lock"></i> Keep your account extra secure</li>
                </ul>
                <br>
                <?php if (!empty($_SESSION['username'])): ?>
                <!-- LOGGED IN: -->
                <a href="dashboard.php" class="cta-btn glow-btn">Get Started</a>
                <?php else: ?>
                <!-- NOT LOGGED IN: -->
                <a href="signup.php" class="cta-btn glow-btn">Get Started</a>
                <?php endif; ?>
            </div>
            <div class="hero-image animate-fadein-right">
                <img src="images/hero.png" alt="Productivity Illustration">
            </div>
        </div>
    </section>


    <!-- FEATURES SECTION -->
    <section class="expect-section">
        <h2>What you can expect from us?</h2>
        <div class="expect-cards">
            <div class="expect-card">
                <img src="images/feature1.png" alt="Task Management">
                <h4>Task Management</h4>
                <p>Organize tasks and stay on track.</p>
            </div>
            <div class="expect-card">
                <img src="images/feature2.png" alt="Collaboration Tools">
                <h4>Collaboration Tools</h4>
                <p>Connect and communicate with your team.</p>
            </div>
            <div class="expect-card">
                <img src="images/feature3.png" alt="Analytics">
                <h4>Productivity Analytics</h4>
                <p>See how well you're doing and improve.</p>
            </div>
        </div>
    </section>

    <!-- VIDEO + EXPLAINER -->
    <section id="about" class="platform-section">
        <div class="platform-flex container">
            <div class="platform-video">
                <video controls>
                    <source src="video/demo.mp4" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="platform-text">
                <h2><i class="fas fa-cogs"></i> How Our Platform Works</h2>
                <p>Xperties simplifies workflow. Track progress, assign tasks, share files, and analyze productivity—all
                    in one place.</p>
                <?php if (!empty($_SESSION['username'])): ?>
                <!-- LOGGED IN: -->
                <a href="dashboard.php" class="cta-btn glow-btn">Explore Features</a>
                <?php else: ?>
                <!-- NOT LOGGED IN: -->
                <a href="signup.php" class="platform-btn">Explore Features</a>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <!-- WORKFLOW SECTION -->
    <section class="potential-section">
        <h2 class="section-title">Unlock Your Full Potential</h2>
        <div class="potential-cards">
            <div class="card">
                <img src="images/efficiency.png" alt="Boost Efficiency">
                <h3>Boost Efficiency</h3>
                <p>Stay focused and save time with streamlined tools.</p>
            </div>
            <div class="card">
                <img src="images/teamwork.png" alt="Work Together">
                <h3>Work Together</h3>
                <p>Collaborate with freelancers from across the globe.</p>
            </div>
            <div class="card">
                <img src="images/insights.png" alt="Gain Insights">
                <h3>Gain Insights</h3>
                <p>Make smarter decisions using real-time data.</p>
            </div>
        </div>
    </section>


    <!-- FEATURES & BENEFITS SECTION -->
    <section id="features" class="features-benefits">
        <div class="info-box features">
            <h3><i class="fas fa-tools"></i> Features</h3>
            <ul>
                <li><i class="fas fa-thumbtack"></i> Organize tasks, set deadlines, and prioritize.</li>
                <li><i class="fas fa-clock"></i> Monitor work hours to improve efficiency.</li>
                <li><i class="fas fa-wrench"></i> Set individual or team-based goals and monitor milestone completion.</li>
                <li><i class="fas fa-comments"></i> Share tasks, communicate, and work in teams.</li>
                <li><i class="fas fa-chart-bar"></i> Get insights and reports on work performance.</li>
            </ul>
        </div>

        <div class="info-box benefits">
            <h3><i class="fas fa-rocket"></i> Benefits</h3>
            <ul>
                <li><i class="fas fa-hourglass-half"></i> Reduce wasted time and improve workflow.</li>
                <li><i class="fas fa-tasks"></i> Keep track of projects and deadlines efficiently.</li>
                <li><i class="fas fa-handshake"></i> Improve collaboration for group projects.</li>
                <li><i class="fas fa-rocket"></i> Foster accountability and motivation across freelancers and collaborators.</li>
                <li><i class="fas fa-file-alt"></i> Make better decisions with productivity reports.</li>
            </ul>
        </div>

        <div class="image-box">
            <img src="images/benefits_image.png" alt="Visual Representation">
        </div>
    </section>




    <!-- TESTIMONIALS SECTION -->
    <section class="testimonial-section">
        <div class="container">
            <h2>What Our Users Say</h2>
            <div class="testimonial-grid">

                <!-- Testimonial Card 1 -->
                <div class="testimonial-card">
                    <img src="images/user1.png" alt="Kevin Shat photo">
                    <p><em>"Xperties was a game-changer for my freelancing. Everything’s so much smoother now!"</em></p>
                    <strong>Kevin Shat, Graphic Designer</strong>
                    <div class="testimonial-stars">★★★★★</div>
                </div>

                <!-- Testimonial Card 2 -->
                <div class="testimonial-card">
                    <img src="images/user2.png" alt="Aaron Doofus photo">
                    <p><em>"Managing my workload is finally stress-free. I love the analytics feature!"</em></p>
                    <strong>Aaron Doofus., Content Writer</strong>
                    <div class="testimonial-stars">★★★★★</div>
                </div>

                <!-- Testimonial Card 3 -->
                <div class="testimonial-card">
                    <img src="images/user3.png" alt="Anotny Mackarel photo">
                    <p><em>"Collaboration has never been easier. I can communicate and stay on track effortlessly."</em>
                    </p>
                    <strong>Anotny Mackarel, Web Developer</strong>
                    <div class="testimonial-stars">★★★★★</div>
                </div>

            </div>
        </div>
    </section>


    <!-- FINAL CTA -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Take Control of Your Work?</h2>
            <p>Create your account and start boosting your productivity now.</p>
            <br>
            <?php if (!empty($_SESSION['username'])): ?>
            <!-- LOGGED IN: -->
            <a href="dashboard.php" class="cta-btn">Roll Out!</a>
            <?php else: ?>
            <!-- NOT LOGGED IN: -->
            <a href="signup.php" class="cta-btn">Sign Up Today!</a>
            <?php endif; ?>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container footer-flex">
            <img src="images/logo.png" alt="Xperties Logo" class="footer-logo">
            <div class="footer-links">
                <a href="#">Home</a> |
                <a href="#">About</a> |
                <a href="contact.php">Contact us</a>
            </div>
            <div>&copy; 2025 Xperties. All rights reserved.</div>
        </div>
    </footer>

</body>

</html>