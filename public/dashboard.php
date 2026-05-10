<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <a href="">Dashboard</a>
    <a href="">Products</a>
    <a href="">Users</a>
    <a href="">Posts</a>
    <h1>Welcome, <?php echo $_SESSION["firstname"]; ?>!</h1>

    <a href="logout.php">Logout</a>

</body>

</html>