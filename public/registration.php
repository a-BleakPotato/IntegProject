<?php
// Database connection
$host = "localhost";
$dbname = "dummyjson_db";
$username = "root";
$password = "";

$message = "";
$messageType = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Trim inputs (removes spaces)
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);
    $confirm = trim($_POST["confirmpassword"]);

    // Validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($user) || empty($pass) || empty($confirm)) {
        $message = "All fields are required.";
        $messageType = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
        $messageType = "error";
    } elseif ($pass !== $confirm) {
        $message = "Passwords do not match.";
        $messageType = "error";
    } else {

        // Check duplicates
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $user]);

        if ($stmt->rowCount() > 0) {
            $message = "Email or username already exists.";
            $messageType = "error";
        } else {

            // Hash password
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

            // Insert user
            $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, username, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$firstname, $lastname, $email, $user, $hashedPassword]);

            $message = "Registration successful! Redirecting...";
            $messageType = "success";

            header("refresh:3;url=login.php");
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets//css/registration.css" />
    <link
        rel="shortcut icon"
        href="assets/svg/Logo.svg"
        type="image/x-icon" />
</head>

<body>
    <div class="wrap">
        <div class="signup-form">
            <form action="" method="POST">
                <div class="container">
                    <h1 class="signup">Sign Up</h1>
                    <div class="row">
                        <div class="input-group">
                            <label for="lastname">Last Name</label>
                            <input
                                type="text"
                                name="lastname"
                                id="lastname"
                                required />
                        </div>
                        <div class="input-group">
                            <label for="firstname">First Name</label>
                            <input
                                type="text"
                                name="firstname"
                                id="firstname"
                                required />
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            required />
                    </div>
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input
                            type="text"
                            name="username"
                            id="username"
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
                    <div class="input-group">
                        <label for="confirmpassword">Confirm Password</label>
                        <div class="password-wrapper">
                            <input
                                type="password"
                                name="confirmpassword"
                                id="confirmpassword"
                                required />
                            <button
                                type="button"
                                id="toggleBtn"
                                onclick="toggleConfirmPassword()">
                                <img
                                    src="assets/svg/eye-solid-full.svg"
                                    alt="Show"
                                    id="eyeConfirmIcon"
                                    width="30" />
                            </button>
                        </div>
                    </div>
                    <?php if (!empty($message)): ?>
                        <p class="<?php echo $messageType; ?>">
                            <?php echo $message; ?>
                        </p>
                    <?php endif; ?>
                    <button type="submit" class="registrationbtn">
                        Sign Up
                    </button>
                    <p>
                        Already have an account?
                        <a href="login.php">Sign In</a>
                    </p>
                </div>
            </form>
        </div>
        <div class="title-section">
            <img
                id="registration-svg"
                src="assets/svg/undraw_sign-up_qamz.svg"
                alt="Sign up svg" />
            <h1 class="title-h1">Develop, Build, and Test.</h1>

            <p>
                With DummyJSON API, Get instant dummy JSON data for your
                frontend — no backend setup needed!
            </p>
        </div>
    </div>
    <script src="assets/js/registration_form.js"></script>
</body>

</html>