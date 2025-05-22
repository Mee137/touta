<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="images/favicon.jpg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login Fixed</title>
</head>

<body>
    <div class="wrapper">
        <form action="login.php" method="POST">
            <h1>Login</h1>

            <?php if (isset($_SESSION['login_error'])): ?>
                <div class="error-message">
                    <?= htmlspecialchars($_SESSION['login_error']) ?>
                    <?php unset($_SESSION['login_error']); ?>
                </div>
            <?php endif; ?>

            <div class="inputs">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputs">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            
            <button type="submit" class="btn">Login</button>
            <div class="register">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>
<?php
require 'config.php';

if(isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['last_login'] = time();
                
                header("Location: home.php");
                exit();
            } else {
                $_SESSION['login_error'] = 'Incorrect password';
            }
        } else {
            $_SESSION['login_error'] = 'Invalid username';
        }
    } catch (PDOException $e) {
        $_SESSION['login_error'] = 'problem in system , please try later!!';
        error_log("Login error: " . $e->getMessage());
    }
    
    header("Location: login.php");
    exit();
}
?>