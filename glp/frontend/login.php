<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reglog.css">
    <link rel="shortcut icon" href="../img/FruitHubLogo.ico" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <img src="../img/FruitHubLogo.png" alt="">
        <p class="fruithub">GroceryHub</p>

        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<p style='color: red;'>" . $_SESSION['login_error'] . "</p>";
            unset($_SESSION['login_error']); 
        }
        ?>

        <form action="../backend/login_action.php" method="POST">
            <input type="text" name="text" id="text" placeholder="Username or Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button>Login</button>
            <p class="text">Don't have an account? <a href="../frontend/register.php">Click here</a></p>
         </form>
    </div>
</body>
</html>
