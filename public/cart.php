<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// GET USER ID
if (!isset($_GET['user_id'])) {
    die("User ID missing.");
}

$userId = intval($_GET['user_id']);



/* =========================
   FETCH USER DATA
========================= */

$userUrl = "https://dummyjson.com/users/$userId";

$userCh = curl_init($userUrl);

curl_setopt($userCh, CURLOPT_RETURNTRANSFER, true);
curl_setopt($userCh, CURLOPT_SSL_VERIFYPEER, false);

$userResponse = curl_exec($userCh);

if ($userResponse === false) {
    die("User API not responding: " . curl_error($userCh));
}

$userHttpCode = curl_getinfo($userCh, CURLINFO_HTTP_CODE);
curl_close($userCh);

if ($userHttpCode != 200) {
    die("User API returned status code: " . $userHttpCode);
}

$userData = json_decode($userResponse, true);



/* =========================
   FETCH USER CART
========================= */

$cartUrl = "https://dummyjson.com/carts/user/$userId";

$cartCh = curl_init($cartUrl);

curl_setopt($cartCh, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cartCh, CURLOPT_SSL_VERIFYPEER, false);

$cartResponse = curl_exec($cartCh);

if ($cartResponse === false) {
    die("Cart API not responding: " . curl_error($cartCh));
}

$cartHttpCode = curl_getinfo($cartCh, CURLINFO_HTTP_CODE);
curl_close($cartCh);

if ($cartHttpCode != 200) {
    die("Cart API returned status code: " . $cartHttpCode);
}

$cartData = json_decode($cartResponse, true);

// CHECK IF USER HAS CARTS
if (empty($cartData['carts'])) {
    die("No carts found for this user.");
}

// USE FIRST CART
$cart = $cartData['carts'][0];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>User Cart</title>

    <link rel="stylesheet" href="assets/css/cart.css">

    <link rel="stylesheet" href="assets/css/sidebar.css">

</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- MAIN CONTENT -->
        <main class="main-content">

            <section class="cart-section">

                <!-- BACK BUTTON -->
                <a href="users.php" class="back-btn">
                    Back
                </a>

                <!-- USER NAME -->
                <h1>
                    User:
                    <?php echo htmlspecialchars($userData['firstName'] . ' ' . $userData['lastName']); ?>
                </h1>

                <!-- CART ID -->
                <h1>
                    Cart ID:
                    <?php echo $cart['id']; ?>
                </h1>

                <!-- TABLE HEADER -->
                <div class="cart-header">

                    <p>Item</p>

                    <p>Quantity</p>

                    <p>Total</p>

                </div>

                <!-- PRODUCTS -->
                <?php foreach ($cart['products'] as $product): ?>

                    <div class="cart-row">

                        <!-- PRODUCT NAME -->
                        <div class="item-name">
                            <?php echo htmlspecialchars($product['title']); ?>
                        </div>

                        <!-- QUANTITY -->
                        <div class="item-qty">
                            <?php echo $product['quantity']; ?>
                        </div>

                        <!-- TOTAL -->
                        <div class="item-total">
                            $<?php echo number_format($product['total'], 2); ?>
                        </div>

                    </div>

                <?php endforeach; ?>

                <!-- FINAL TOTAL -->
                <div class="cart-total">

                    <div class="total-label">
                        TOTAL:
                    </div>

                    <div class="item-qty">
                        <?php echo $cart['totalQuantity']; ?>
                    </div>

                    <div class="item-total">
                        $<?php echo number_format($cart['total'], 2); ?>
                    </div>

                </div>

            </section>

        </main>

    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>