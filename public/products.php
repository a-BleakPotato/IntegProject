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

    <link rel="stylesheet" href="assets/css/products.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <section class="products-section">
                <h2>
                    Products
                </h2>

                <div class="contents">

                    <?php
                    $apiKey = "YOUR API KEY";
                    $url = "https://dummyjson.com/products";

                    $ch = curl_init($url);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                    $response = curl_exec($ch);

                    if ($response === false) {
                        echo "API not responding: " . curl_error($ch);
                        curl_close($ch);
                        exit;
                    }

                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);

                    if ($httpCode != 200) {
                        echo "API returned status code: " . $httpCode;
                        exit;
                    }

                    $data = json_decode($response, true);

                    foreach ($data['products'] as $product) {
                    ?>

                        <div class="items">

                            <div class="stock-tag">
                                Stock: <?php echo $product['stock']; ?>
                            </div>

                            <img
                                class="thumbnail"
                                src="<?php echo $product['thumbnail']; ?>"
                                alt="<?php echo $product['title']; ?>">

                            <div class="item-text">

                                <p class="category">
                                    <?php echo $product['category']; ?>
                                </p>

                                <h3 class="product-name">
                                    <?php echo $product['title']; ?>
                                </h3>

                                <h4 class="price">
                                    $<?php echo $product['price']; ?>
                                </h4>

                            </div>

                        </div>

                    <?php
                    }
                    ?>

                </div>

            </section>
        </main>

    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>