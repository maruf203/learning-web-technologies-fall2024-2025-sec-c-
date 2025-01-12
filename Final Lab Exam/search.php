<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];
$sql = "SELECT * FROM employees WHERE name LIKE '%$query%' OR username LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Contact No: " . $row["contact_no"]. " - Username: " . $row["username"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>