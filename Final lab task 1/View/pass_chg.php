
<?php
session_start();
require_once('../model/usermodel.php');
if ($_SESSION['status'] == true) {   
    $idd = $_REQUEST['id'];
    $user_info = user_info($idd);
    $pass = $user_info['password'];
    $name = $user_info['name'];
}
?>

<html>
<head>
    <title>Password Change</title>
</head>

<body>
    <table align="center" border="1" cellpadding="8" cellspacing="0" style="width: 50%;">
        <form action="../model/pass_change_db.php" method="POST">
            <tr>
                <td colspan="2" align="center" style="font-size: 24px; font-weight: bold;">Change Password</td>
            </tr>
            <tr>
                <td style="width: 40%;">ID</td>
                <td><input type="text" value="<?php echo $idd; ?>" name="id" readonly style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" disabled value="<?php echo $name; ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Old Password</td>
                <td><input type="text" disabled value="<?php echo $pass; ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input name="password" type="password" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Confirm New Password</td>
                <td><input type="password" name="confirm_password" style="width: 100%;"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" style="width: 120px;"> &nbsp;
                    <input type="reset" value="Reset" name="reset" style="width: 120px;">
                </td>
            </tr>
        </form>
    </table>
</body>
</html>
