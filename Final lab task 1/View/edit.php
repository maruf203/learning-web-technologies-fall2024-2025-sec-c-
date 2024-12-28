<?php
session_start();
require_once('../model/usermodel.php');
if ($_SESSION['status'] == true) {
    $idd = $_REQUEST['id'];
    $idt = $_REQUEST['idt'];
    $user_info = user_info($idt);
    $pass = $user_info['password'];
    $name = $user_info['name'];
    $email = $user_info['email'];
  
}
?>

<html>
<head>
    <title>Pass Change</title>
</head>

<body>
    <table align="center" border="1" cellpadding="8" cellspacing="0" style="width: 50%;">
        <form action="../model/edit_user.php?id=<?php echo $idd; ?>&idt=<?php echo $idt; ?>" method="POST">
            <tr>
                <td colspan="2" align="center" style="font-size: 24px; font-weight: bold;">Edit User Information</td>
            </tr>
            <tr>
                <td style="width: 40%;">ID</td>
                <td><input type="text" disabled value="<?php echo $idd; ?>" name="id" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" disabled value="<?php echo $name; ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>New Username</td>
                <td><input type="text" name="new_username" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" disabled value="<?php echo $email; ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>New Email</td>
                <td><input type="email" name="new_email" style="width: 100%;"></td>
            </tr>
            
            <tr>
    <td>Type</td>
    <td><input type="text" disabled value="Admin" style="width: 100%;"></td>
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