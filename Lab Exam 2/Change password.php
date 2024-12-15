<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if ($new_password !== $confirm_new_password) {
        echo "New passwords do not match!";
        exit();
    }

    $id = $_SESSION['id'];
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    $file = fopen("users.txt", "w");
    $password_changed = false;

    foreach ($users as $user) {
        list($stored_id, $stored_password, $stored_name, $stored_user_type) = explode(",", $user);
        if ($stored_id == $id && $stored_password == $current_password) {
            fwrite($file, "$id,$new_password,$stored_name,$stored_user_type\n");
            $password_changed = true;
        } else {
            fwrite($file, "$user\n");
        }
    }

    fclose($file);

    if ($password_changed) {
        echo "Password changed successfully!";
    } else {
        echo "Current password is incorrect!";
    }

    header("Location: home.php");
    exit();
}
?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
head>
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>
    <form action="change_password_process.php" method="post">
        Current Password: <input type="password" name="current_password" required><br>
        New Password: <input type="password" name="new_password" required><br>
        Confirm New Password: <input type="password" name="confirm_new_password" required><br>
        <input type="submit" value="Change Password">
    </form>
    <a href="home.php">Home</a><br>
    <a href="logout.php">Logout</a><br>
</body>
</html>
