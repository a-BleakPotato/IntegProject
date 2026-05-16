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
    <link rel="stylesheet" href="assets/css/sidebar.css">
</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <section class="dashboard-section">
                <h2>
                    Dashboard
                </h2>
                <div class="welcome-box">
                    <div class="welcome-text">
                        <h1>
                            Welcome,
                            <?php echo $_SESSION["username"]; ?>!
                        </h1>
                        <p id="date"></p>
                    </div>
                    <img src="assets/svg/undraw_building-websites_k2zp.svg" alt="">

                </div>

                <h3>
                    Top Resources
                </h3>
                <hr />

                <div class="contents">
                    <a href="products.php" class="items-link">
                        <div class="items">
                            <div class="item-text">
                                <h2>
                                    View Products
                                </h2>
                                <p>https://dummyjson.com/products</p>
                            </div>
                            <img src="assets/svg/products-dashboard.svg" alt="">
                        </div>
                    </a>

                    <a href="users.php" class="items-link">
                        <div class="items">
                            <div class="item-text">
                                <h2>
                                    View Users
                                </h2>
                                <p>https://dummyjson.com/users</p>
                            </div>
                            <img src="assets/svg/users-dashboard.svg" alt="">
                        </div>
                    </a>

                    <a href="users.php" class="items-link">
                        <div class="items">
                            <div class="item-text">
                                <h2>
                                    View Carts
                                </h2>
                                <p>https://dummyjson.com/users</p>
                            </div>
                            <img src="assets/svg/cart-dashboard.svg" alt="">
                        </div>
                    </a>

                    <a href="posts.php" class="items-link">
                        <div class="items">
                            <div class="item-text">
                                <h2>
                                    View Posts
                                </h2>
                                <p>https://dummyjson.com/users</p>
                            </div>
                            <img src="assets/svg/posts-dashboard.svg" alt="">
                        </div>
                    </a>

            </section>
        </main>

    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>