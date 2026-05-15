<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar collapsed" id="sidebar">

            <!-- TOP -->
            <div class="sidebar-top">

                <button class="toggle-btn" id="toggle-btn">
                    <img src="assets/svg/dashboard-solar_hamburger-menu-broken.svg" alt="">
                </button>
                <div class="logo-container">
                    <h2 class="logo-text">DummyJSON API</h2>
                </div>

            </div>

            <!-- MIDDLE -->
            <div class="sidebar-links">
                <!-- DASHBOARD -->
                <a href="dashboard.php" class="nav-link">
                    <div class="link-content">

                        <img
                            class="nav-icon"
                            src="assets/svg/dashboard.svg"
                            data-hover="assets/svg/dashboard-hover.svg"
                            alt="">

                        <span class="link-text">
                            Dashboard
                        </span>
                    </div>
                </a>

                <!-- PRODUCTS -->
                <a href="#" class="nav-link active">
                    <div class="link-content">

                        <img
                            class="nav-icon"
                            src="assets/svg/products-active.svg"
                            alt="">

                        <span class="link-text">
                            Products
                        </span>
                    </div>
                </a>

                <!-- USERS -->
                <a href="#" class="nav-link">
                    <div class="link-content">

                        <img
                            class="nav-icon"
                            src="assets/svg/users.svg"
                            data-hover="assets/svg/users-hover.svg"
                            alt="">

                        <span class="link-text">
                            Users
                        </span>
                    </div>
                </a>

                <!-- POSTS -->
                <a href="#" class="nav-link">
                    <div class="link-content">

                        <img
                            class="nav-icon"
                            src="assets/svg/posts.svg"
                            data-hover="assets/svg/posts-hover.svg"
                            alt="">

                        <span class="link-text">
                            Posts
                        </span>
                    </div>
                </a>
            </div>

            <!-- BOTTOM -->
            <div class="sidebar-bottom">
                <!-- LOGOUT -->
                <a href="logout.php" class="nav-link">
                    <div class="link-content">

                        <img
                            class="nav-icon"
                            src="assets/svg/logout.svg"
                            data-hover="assets/svg/logout-hover.svg"
                            alt="">

                        <span class="link-text">
                            Logout
                        </span>
                    </div>
                </a>

                <!-- USER PROFILE -->
                <div class="user-profile">
                    <div class="avatar"></div>
                    <div class="user-details">
                        <h4><?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?></h4>
                        <p><?php echo $_SESSION["email"]; ?></p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <section class="dashboard-section">
                <h2>
                    Products
                </h2>
            </section>
        </main>

    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>