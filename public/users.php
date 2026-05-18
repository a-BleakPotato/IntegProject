<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// FETCH USERS
$url = "https://dummyjson.com/users";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if ($response === false) {
    die("API not responding: " . curl_error($ch));
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode != 200) {
    die("API returned status code: " . $httpCode);
}

$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <link rel="stylesheet" href="assets/css/users.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- MAIN CONTENT -->
        <main class="main-content">

            <section class="users-section">

                <h2>Users</h2>

                <div class="users-container">

                    <?php foreach ($data['users'] as $user): ?>

                        <div class="user-card">

                            <!-- USER IMAGE -->
                            <img
                                class="user-image"
                                src="<?php echo $user['image']; ?>"
                                alt="<?php echo htmlspecialchars($user['firstName']); ?>">

                            <!-- USER INFO -->
                            <div class="user-info">

                                <h3>
                                    <?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?>
                                </h3>

                                <p class="email">
                                    <?php echo htmlspecialchars($user['email']); ?>
                                </p>

                                <div class="details">
                                    <p>
                                        <strong>Phone:</strong>
                                        <?php echo htmlspecialchars($user['phone']); ?>
                                    </p>

                                    <p>
                                        <strong>Age:</strong>
                                        <?php echo $user['age']; ?>
                                    </p>
                                </div>

                            </div>

                            <!-- BUTTON -->
                            <a
                                class="cart-link"
                                href="cart.php?user_id=<?php echo $user['id']; ?>">
                                <button class="view-cart-btn">
                                    View Cart
                                </button>
                            </a>

                        </div>

                    <?php endforeach; ?>

                </div>

            </section>

        </main>

    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>