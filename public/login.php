<?php
session_start();

// DB connection
$host = "localhost";
$dbname = "dummyjson_db";
$username = "root";
$password = "";

$message = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userInput = trim($_POST["username-email"]);
    $pass = trim($_POST["password"]);

    if (empty($userInput) || empty($pass)) {
        $message = "All fields are required.";
    } else {

        // Check if user exists (email OR username)
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$userInput, $userInput]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            // Verify password
            if (password_verify($pass, $user["password"])) {

                // Create session
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["firstname"] = $user["firstname"];
                $_SESSION["lastname"] = $user["lastname"];

                // Redirect to dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                $message = "Incorrect password.";
            }
        } else {
            $message = "User not found.";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/login.css" />
    <link
        rel="shortcut icon"
        href="assets/svg/Logo.svg"
        type="image/x-icon" />
</head>

<body>
    <div class="wrap">
        <div class="title-section">
            <img
                src="assets/svg/undraw_sign-in_uva0.svg"
                alt="Sign In svg"
                id="login-svg" />
            <h1 class="title-h1">Develop, Build, and Test</h1>
            <p>
                With DummyJSON API, Get instant dummy JSON data for your
                frontend — no backend setup needed!
            </p>
        </div>
        <div class="signin-form">
            <form action="" method="POST">
                <div class="container">
                    <h1 class="signin">Sign In</h1>
                    <div class="input-group">
                        <label for="username-email">Username or Email</label>
                        <input
                            type="text"
                            name="username-email"
                            id="username-email"
                            required />
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input
                                type="password"
                                name="password"
                                id="password"
                                required />
                            <button
                                type="button"
                                id="toggleBtn"
                                onclick="togglePassword()">
                                <img
                                    src="assets/svg/eye-solid-full.svg"
                                    alt="Show"
                                    id="eyeIcon"
                                    width="30" />
                            </button>
                        </div>
                    </div>
                    <?php if (!empty($message)): ?>
                        <p style="color: red; text-align: center;">
                            <?php echo $message; ?>
                        </p>
                    <?php endif; ?>
                    <button type="submit" class="loginbtn">Sign In</button>
                    <p>
                        Don't have an account?
                        <a href="registration.php">Sign Up</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/login.js"></script>
</body>

</html>