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
    <title>Register</title>
</head>
<body>
    <div class="container">
        <img src="../img/FruitHubLogo.png" alt="">
        <p class="fruithub">GroceryHub</p>          

        <?php
        if (isset($_SESSION['register_success'])) {
            echo "<p style='color: green; font-weight: bold;'>" . $_SESSION['register_success'] . "</p>";
            unset($_SESSION['register_success']);
        }
        ?>

        <form action="../backend/register_action.php" method="POST">
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button>Register</button>
            <p class="text">Don't have an account? <a href="../frontend/login.php">Click here</a></p>
         </form>
    </div>

</body>
</html>
