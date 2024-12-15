<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Profile Page</h2>
    <p>ID: <?php echo $_SESSION['id']; ?></p>
    <p>Name: <?php echo $_SESSION['name']; ?></p>
    <p>User Type: <?php echo $_SESSION['user_type']; ?></p>
    <a href="home.php">Home</a><br>
    <a href="change_password.php">Change Password</a><br>
    <a href="logout.php">Logout</a><br>
</body>
</html>
