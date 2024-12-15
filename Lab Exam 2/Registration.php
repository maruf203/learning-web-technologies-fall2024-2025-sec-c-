<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Registration</h2>
    <form action="register.php" method="post">
        Id: <input type="text" name="id" required><br>
        Password: <input type="password" name="password" required><br>
        Confirm Password: <input type="password" name="confirm_password" required><br>
        Name: <input type="text" name="name" required><br>
        User Type: 
        <input type="radio" name="user_type" value="User" required>User 
        <input type="radio" name="user_type" value="Admin" required>Admin<br>
        <input type="submit" value="Sign Up">
    </form>
    <a href="login.html">Sign In</a>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $name = $_POST['name'];
    $user_type = $_POST['user_type'];

    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    $file = fopen("users.txt", "a");
    fwrite($file, "$id,$password,$name,$user_type\n");
    fclose($file);

    header("Location: login.html");
    exit();
}
?>
