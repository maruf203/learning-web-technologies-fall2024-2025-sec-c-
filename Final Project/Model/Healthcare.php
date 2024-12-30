<?php


class healthcare{
public  $DBHostName="";
public $DBUserName="";
public $DBPassword="";
public $DBName="";
function __construct(){
 $this->DBHostName="localhost";
 $this->DBUserName="root";
 $this->DBPassword="";
 $this->DBName="healthcare";
}

function createConObject(){
    return new mysqli($this->DBHostName, $this->DBUserName, $this->DBPassword, 
    $this->DBName);
}

function insertOrder($conn,$table,$Name, $Email, $Password){
$qrystring="INSERT INTO $table (Name,Email,Password) 
VALUES (  '$Nmae',   '$Email', '$password' )";
$result = $conn->query($qrystring);
if($result === false)
{
    return $conn->error;
}
else{
    return $result;
}
}




function closeCon($conn)
{
 $conn->close();
}

}




?>
