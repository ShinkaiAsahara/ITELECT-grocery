<?php
session_start();

$_SESSION = [];

session_destroy();

header("Location: ../frontend/login.php?message=logged_out");
exit();
?>
