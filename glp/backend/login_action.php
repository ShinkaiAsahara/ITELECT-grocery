<?php
session_start(); 
include_once '../backend/database/db_conn.php';

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usernameOrEmail = $_POST['text'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username='$usernameOrEmail' OR email='$usernameOrEmail'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id']; 
                header("Location: ../frontend/main.php"); 
                exit();
            }
        }
        $_SESSION['login_error'] = "This account is not Registered.";
        header("Location: ../frontend/login.php"); 
        exit();
    }
}
mysqli_close($conn);
?>
