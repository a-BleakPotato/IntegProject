<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

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
        <a href="dashboard.php"
            class="nav-link <?= ($currentPage == 'dashboard.php') ? 'active' : '' ?>">

            <div class="link-content">

                <img
                    class="nav-icon"
                    src="<?= ($currentPage == 'dashboard.php')
                                ? 'assets/svg/dashboard-active.svg'
                                : 'assets/svg/dashboard.svg' ?>"

                    data-default="assets/svg/dashboard.svg"
                    data-hover="assets/svg/dashboard-hover.svg"
                    data-active="assets/svg/dashboard-active.svg"
                    alt="">

                <span class="link-text">
                    Dashboard
                </span>

            </div>
        </a>

        <!-- PRODUCTS -->
        <a href="products.php"
            class="nav-link <?= ($currentPage == 'products.php') ? 'active' : '' ?>">

            <div class="link-content">

                <img
                    class="nav-icon"
                    src="<?= ($currentPage == 'products.php')
                                ? 'assets/svg/products-active.svg'
                                : 'assets/svg/products.svg' ?>"

                    data-default="assets/svg/products.svg"
                    data-hover="assets/svg/products-hover.svg"
                    data-active="assets/svg/products-active.svg"
                    alt="">

                <span class="link-text">
                    Products
                </span>

            </div>
        </a>

        <!-- USERS -->
        <a href="users.php"
            class="nav-link <?= ($currentPage == 'users.php') ? 'active' : '' ?>">

            <div class="link-content">

                <img
                    class="nav-icon"
                    src="<?= ($currentPage == 'users.php')
                                ? 'assets/svg/users-active.svg'
                                : 'assets/svg/users.svg' ?>"

                    data-default="assets/svg/users.svg"
                    data-hover="assets/svg/users-hover.svg"
                    data-active="assets/svg/users-active.svg"
                    alt="">

                <span class="link-text">
                    Users
                </span>

            </div>
        </a>

        <!-- POSTS -->
        <a href="posts.php"
            class="nav-link <?= ($currentPage == 'posts.php') ? 'active' : '' ?>">

            <div class="link-content">

                <img
                    class="nav-icon"
                    src="<?= ($currentPage == 'posts.php')
                                ? 'assets/svg/posts-active.svg'
                                : 'assets/svg/posts.svg' ?>"

                    data-default="assets/svg/posts.svg"
                    data-hover="assets/svg/posts-hover.svg"
                    data-active="assets/svg/posts-active.svg"
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
                    src="<?= ($currentPage == 'logout.php')
                                ? 'assets/svg/logout-active.svg'
                                : 'assets/svg/logout.svg' ?>"

                    data-default="assets/svg/logout.svg"
                    data-hover="assets/svg/logout-hover.svg"
                    data-active="assets/svg/logout-active.svg"
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
                <h4>
                    <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?>
                </h4>

                <p>
                    <?php echo $_SESSION["email"]; ?>
                </p>
            </div>

        </div>

    </div>

</aside>