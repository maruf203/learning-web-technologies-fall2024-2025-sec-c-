<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$contact_no = $_POST['contact_no'];
$username = $_POST['username'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO employees (name, contact_no, username, password) VALUES ('$name','$contact_no', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New employee registered successfully";
    echo '<br><a href="login.html">LogIN</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

