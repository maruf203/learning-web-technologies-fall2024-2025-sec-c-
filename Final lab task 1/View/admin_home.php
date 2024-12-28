
<?php
session_start();
require_once("../model/usermodel.php");
if ($_SESSION['status'] == true) {
    $idd = $_REQUEST['id'];
    $user_info = user_info($idd);
    $name = $user_info['name'];
    ?>

<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <table align="center" border="1" cellspacing="0" cellpadding="10" style="width: 50%; height: 50%;">
        <tr align="center">
            <td>
                <h1>Welcome <?php echo $name . "!"; ?></h1>
                <a href="profile.php?id=<?php echo $idd; ?>">Profile</a><br>
                <a href="pass_change.php?id=<?php echo $idd; ?>">Change Password</a><br>
                <a href="view_users.php?id=<?php echo $idd; ?>">View Users</a><br>
                <a href="../controller/logout.php">Logout</a><br>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
} else {
    header("location:login.html");
}
?>
