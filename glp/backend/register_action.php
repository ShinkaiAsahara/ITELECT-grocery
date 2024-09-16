<?php
session_start(); 
include_once '../backend/database/db_conn.php';

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['register_success'] = "Registration successful!";
            header("Location: ../frontend/register.php"); 
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
