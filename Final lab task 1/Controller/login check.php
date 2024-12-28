
<?php
session_start();
require_once('../model/usermodel.php');
if(isset($_POST['login'])){
    $id = trim($_POST["id"]);
    $password = trim($_POST["password"]);
    if(empty($id) || empty($password)){
        echo "<h3>Username or Password is emtpy</h3>";
    }
    else{
        $login_status = login($id, $password);
        if($login_status == false){
            echo "<h3>Invalid Username and Password</h3>";  
        }
        else{
            $_SESSION['status'] = true;
            if($login_status == 'User'){
            header("location:../view/user_home.php?id={$id}");
            }
            else if($login_status == 'Advertiser'){
            header("location:../view/advertiser_home.php?id={$id}");
            }
            else{
            header("location:../view/admin_home.php?id={$id}");
            }
        }
    }

}
else{
    header("location:../view/login.html");
}

?>
