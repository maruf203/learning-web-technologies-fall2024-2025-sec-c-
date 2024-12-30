
<?php
session_start();

// Debug session data
if (empty($_SESSION)) {
    echo "Session is empty. Please register or login first.";
    exit();
}

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo "You are not logged in! Redirecting to login page...";
    header("Refresh: 2; url=login.php");
    exit();
}

$user = $_SESSION["user"] ?? null;
if (!$user) {
    echo "User information is missing in the session. Redirecting to registration...";
    header("Refresh: 2; url=register.php");
    exit();
}
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Contact Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>


<h1>Welcome, <?php echo htmlspecialchars($user["Name"]); ?>!</h1>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user["Email"]); ?></p>
    <a href="logout.php">Logout</a>

    <div class="container">
        <nav>
            <ul>
                <li><a href="emergency_contact.php">Emergency Contact</a></li>
                <li><a href="lab test.php">Lab Test Booking</a></li>
                <li><a href="Faq.php">Faq</a></li>
                <li><a href="medical history.php">medical history</a></li>
            </ul>
        </nav>
        <center>
            <h1>Emergency Contact Information</h1>
            <form id="contact-form" method="post" action="emergency_contact.php">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="relationship">Relationship:</label>
                    <input type="text" id="relationship" name="relationship" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit">Add Contact</button>
            </form>
            <h2>Saved Emergency Contacts</h2>
            <ul id="contact-list">
                <?php
                // Database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Healthcare";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Function to sanitize user input
                function sanitizeInput($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                // Add contact if form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = sanitizeInput($_POST['name']);
                    $relationship = sanitizeInput($_POST['relationship']);
                    $phone = sanitizeInput($_POST['phone']);
                    $email = sanitizeInput($_POST['email']);

                    $errors = [];

                    // Validate name
                    if (empty($name)) {
                        $errors[] = "Name is required";
                    }

                    // Validate relationship
                    if (empty($relationship)) {
                        $errors[] = "Relationship is required";
                    }

                    // Validate phone number
                    if (empty($phone)) {
                        $errors[] = "Phone number is required";
                    } elseif (!preg_match("/^\d{10}$/", $phone)) {
                        $errors[] = "Invalid phone number format";
                    }

                    // Validate email
                    if (empty($email)) {
                        $errors[] = "Email is required";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Invalid email format";
                    }

                    if (empty($errors)) {
                        // Prepare and bind
                        $stmt = $conn->prepare("INSERT INTO emergency_contact (FullName, Relation, Phonenumber, Email) VALUES (?, ?, ?, ?)");
                        if ($stmt) {
                            $stmt->bind_param("ssss", $name, $relationship, $phone, $email);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "Error preparing statement: " . $conn->error;
                        }
                    } else {
                        foreach ($errors as $error) {
                            echo "<p style='color: red;'>$error</p>";
                        }
                    }
                }

                // Fetch contacts from the database
                $sql = "SELECT id, FullName, Relation, Phonenumber, Email FROM emergency_contact";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($row["name"]) . " - " . htmlspecialchars($row["relationship"]) . " - " . htmlspecialchars($row["phone"]) . " - " . htmlspecialchars($row["email"]) . "</li>";
                    }
                } else {
                    echo "<li>No contacts found</li>";
                }

                $conn->close();
                ?>
            </ul>
        </center>
    </div>
</body>
</html>
