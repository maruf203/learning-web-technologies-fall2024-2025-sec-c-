<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Contact No: " . $row["contact_no"]. " - Username: " . $row["username"]. 
        " <button onclick=\"editEmployee(" . $row['id'] . ", '" . $row['name'] . "', '" . $row['contact_no'] . "', '" . $row['username'] . "')\">Edit</button>" .
        " <button onclick=\"deleteEmployee(" . $row['id'] . ")\">Delete</button><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>