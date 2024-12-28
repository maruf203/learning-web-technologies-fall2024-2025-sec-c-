<?php
session_start();
require_once('../model/usermodel.php');
if ($_SESSION['status'] == true) {
    $idd = $_REQUEST['id'];
    $user_info = user_info($idd);
    $name = $user_info['name'];
    $id = $user_info['id'];
    $email = $user_info['email'];
?>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <table align="center" border="1" cellpadding="8" cellspacing="0" style="width: 50%;">
        <tr align="center">
            <td colspan="2" style="font-size: 24px; font-weight: bold;">Profile</td>
        </tr>
        <tr>
            <td style="width: 40%;">ID</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Type</td>
            <td>Admin</td> <!-- Hardcoded as Admin -->
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="admin_home.php?id=<?php echo $idd; ?>">Go Home</a>
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