<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        User Id: <input type="text" name="id" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <a href="register.html">Register</a>
</body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    $file = fopen("users.txt", "r");
    $validUser = false;
    while (($line = fgets($file)) !== false) {
        list($stored_id, $stored_password, $stored_name, $stored_user_type) = explode(",", trim($line));
        if ($stored_id == $id && $stored_password == $password) {
            $validUser = true;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $stored_name;
            $_SESSION['user_type'] = $stored_user_type;
            break;
        }
    }
    fclose($file);

    if ($validUser) {
        header("Location: home.php");
    } else {
        echo "Invalid id or password";
    }
    exit();
}
?>
