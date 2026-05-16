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
                <h2>
                    Users
                </h2>
            </section>
        </main>

    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>