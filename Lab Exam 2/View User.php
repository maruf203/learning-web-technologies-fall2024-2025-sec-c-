<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['user_type'] != 'Admin') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <h2>Users List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>User Type</th>
        </tr>
        <?php
        $file = fopen("users.txt", "r");
        while (($line = fgets($file)) !== false) {
            list($id, $password, $name, $user_type) = explode(",", trim($line));
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$user_type</td>";
            echo "</tr>";
        }
        fclose($file);
        ?>
    </table>
    <a href="home.php">Home</a><br>
    <a href="logout.php">Logout</a><br>
</body>
</html>
