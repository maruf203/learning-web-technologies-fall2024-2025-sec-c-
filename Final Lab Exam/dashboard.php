<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="register.html">Register New Employee</a>
    <br>
    <a href="search.html">Search Employee</a>
    <br>
    <div id="employeeList"></div>

    <script>
        function loadEmployees() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "list_employees.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("employeeList").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function deleteEmployee(id) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "delete.php?id=" + id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    loadEmployees();
                }
            };
            xhr.send();
        }

        function editEmployee(id, name, contact_no, username) {
            document.getElementById("employeeId").value = id;
            document.getElementById("name").value = name;
            document.getElementById("contact_no").value = contact_no;
            document.getElementById("username").value = username;
        }

        window.onload = loadEmployees;
    </script>
</body>
</html>