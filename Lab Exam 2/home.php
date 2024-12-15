<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}

$name = $_SESSION['name'];
$user_type = $_SESSION['user_type'];

if ($user_type == 'Admin') {
    header("Location: admin_home.php");
} else {
    header("Location: user_home.php");
}
?>
