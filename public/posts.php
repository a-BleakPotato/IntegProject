<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// FETCH POSTS
$url = "https://dummyjson.com/posts";

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
    <title>Posts</title>

    <link rel="stylesheet" href="assets/css/posts.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">

    <!-- ICONS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- MAIN CONTENT -->
        <main class="main-content">

            <section class="posts-section">

                <h2>Posts</h2>

                <div class="posts-container">

                    <?php foreach ($data['posts'] as $post): ?>

                        <div class="post-card">

                            <div class="post-content">

                                <h3 class="post-title">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </h3>

                                <p class="post-body">
                                    <?php echo htmlspecialchars($post['body']); ?>
                                </p>

                                <!-- TAGS -->
                                <div class="tags">

                                    <?php foreach ($post['tags'] as $tag): ?>

                                        <span class="tag">
                                            <?php echo htmlspecialchars($tag); ?>
                                        </span>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                            <!-- FOOTER -->
                            <div class="post-footer">

                                <div class="post-stats">

                                    <div class="stat">
                                        <i class="fa-regular fa-heart"></i>
                                        <span><?php echo $post['reactions']['likes']; ?></span>
                                    </div>

                                    <div class="stat">
                                        <i class="fa-regular fa-thumbs-down"></i>
                                        <span><?php echo $post['reactions']['dislikes']; ?></span>
                                    </div>

                                </div>

                                <div class="views">
                                    <?php echo $post['views']; ?> views
                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </section>

        </main>

    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>