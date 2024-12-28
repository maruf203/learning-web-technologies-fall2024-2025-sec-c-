<?php
$idd = $_REQUEST['id'];
$idt = $_REQUEST['idt'];
require_once("usermodel.php");

$result = delete_user($idt);
if($result){
    echo "user deleted";
}
else{
    echo "some error";
}
?>

<a href="../view/view_users.php?id=<?php echo $idd ?>"> Go Back</a>

