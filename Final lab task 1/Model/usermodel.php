
<?php

function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'check');
    return $conn;
}


function login($id, $password){
    $conn = getConnection();
    $sql = "select * from users where id = '{$id}' and password = '{$password}'";
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($result);
    if(isset($user['type'])){
        return $user['type'];
    }
    else{
    return false;
    }
}
function addUser($name, $password, $id, $email, $type = "Admin") {
    $conn = getConnection();
    $sql = "INSERT INTO users (name, password, id, email, type) VALUES ('$name', '$password', '$id', '$email', '$type')";
    $result = mysqli_query($conn, $sql);
    return $result ? true : false;
}


function user_info($id){
    $conn = getConnection();
    $sql = "select * from users where id = '$id'";
    $result = mysqli_query($conn, $sql);
 

    $row = mysqli_fetch_assoc($result);
        return $row; 
    
}


function show_users(){
    $conn = getConnection();
    $sql = "select * from users";
    $result = mysqli_query($conn, $sql);
    return $result;
 
}


function delete_user($idt){
    $conn = getConnection();
    $sql = "DELETE FROM users WHERE id='$idt'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function edit_user($idt, $name, $email) {
    $conn = getConnection();
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $idt";
    $result = mysqli_query($conn, $sql);
    return $result ? true : false;
}



  

?>
