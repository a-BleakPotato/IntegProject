<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DummyJSON Web App</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
        rel="shortcut icon"
        href="assets/svg/Logo.svg"
        type="image/x-icon" />
</head>

<body>
    <div class="wrapper">
        <header>
            <nav>
                <button class="hamburger" id="hamburger">
                    <img src="assets/svg/hamburger.svg" alt="☰">
                </button>
                <div class="nav-left">
                    <ul class="nav-links">
                        <li>
                            <a href="#home-section" class="active">Home</a>
                        </li>
                        <li>
                            <a href="#about-section">About</a>
                        </li>
                    </ul>
                </div>
                <div class="logo">DummyJSON API</div>
                <div class="nav-right">
                    <ul class="nav-links">
                        <li>
                            <a href="login.php">Sign In</a>
                        </li>

                        <li>
                            <a href="registration.php" class="signup-btn">
                                Sign Up
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-menu" id="navMenu">
                    <!-- CLOSE BUTTON -->
                    <button class="close-menu" id="closeMenu">
                        <img src="assets/svg/close.svg" alt="✕">
                    </button>
                    <!-- MOBILE LINKS -->
                    <ul class="mobile-links">
                        <li>
                            <a href="#home-section">Home</a>
                        </li>
                        <li>
                            <a href="#about-section">About</a>
                        </li>
                        <li>
                            <a href="login.php">Sign In</a>
                        </li>
                        <li>
                            <a href="registration.php" class="signup-btn">
                                Sign Up
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <section class="home-section" id="home-section">
            <div class="hero-section">
                <div class="hero-text-section">
                    <h1>
                        <span class="title">Develop, Build, and Test.</span><br />
                        Now made easier with the use of Fake Data!
                    </h1>
                    <p>
                        Get Free Fake Rest API for Placeholder JSON Data
                        for your Frontend.
                    </p>
                    <div class="btn">
                        <a class="getstarted-btn" href="registration.php">Get Started</a>
                    </div>
                </div>
                <div class="hero-img">
                    <img
                        class="hero-img-svg"
                        src="assets/svg/undraw_code-thinking_0vf2.svg"
                        alt="EEEE" />
                </div>
            </div>
        </section>
        <section class="about-section" id="about-section">
            <div class="hero-section">
                <div class="folder-img">
                    <img
                        class="folder-img-svg"
                        src="assets/svg/undraw_folder_8dxv.svg"
                        alt="EEEE" />
                </div>
                <div class="about-text-section">
                    <h1>
                        <span class="title">Ready to use Resources.</span><br />
                        From Dummy Text to Placeholder Images —
                    </h1>
                    <p>
                        DummyJSON API allows you to access 10 diverse
                        datasets with JSON Placeholder Data.
                    </p>
                    <div class="btn">
                        <a class="getstarted-btn" href="registration.php">Try it Now!</a>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <hr />
            <div class="footer-section">
                <div class="title-footer">
                    <h2 class="h2-footer">
                        <span class="title">DummyJSON API</span>
                    </h2>
                    <p>
                        Visit the Official Website
                        <span class="link"><a href="https://dummyjson.com/">Here</a></span><br>
                        &copy; 2026 DummyJSON API. All Rights Reserved.
                    </p>
                </div>
                <div class="links-footer">
                    <ul>
                        <li>
                            <a href="https://github.com/Ovi/DummyJSON"><img
                                    src="assets/svg/mdi_github.svg"
                                    alt="GitHub" /></a>
                        </li>
                        <li>
                            <a href="https://x.com/DummyJSON"><img
                                    src="assets/svg/prime_twitter.svg"
                                    alt="Twitter/X" /></a>
                        </li>
                        <li>
                            <a
                                href="https://www.linkedin.com/company/dummyjson"><img
                                    src="assets/svg/ri_linkedin-fill.svg"
                                    alt="LinkedIn" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/script.js" defer></script>
</body>

</html>