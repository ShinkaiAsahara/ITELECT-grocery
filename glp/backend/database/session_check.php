<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['login_error'] = "Login sa mego.";
    header("Location: ../frontend/login.php");
    exit();
}
?>
