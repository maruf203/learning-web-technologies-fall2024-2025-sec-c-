<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Test Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="emegency contact.php">Emergency Contact</a></li>
            
                <li><a href="Faq.php">Faq section</a></li>

            </ul>
        </nav>
        <center><h1>Book a Lab Test</h1></center>
        <form id="booking-form" method="post" action="lab_test_booking.php">
        <center>   
        <div class="form-group">
                <label for="patient-name">Patient Name:</label>
                <input type="text" id="patient-name" name="patient_name" required>
            </div>
            <div class="form-group">
                <label for="test-name">Test Name:</label>
                <input type="text" id="test-name" name="test_name" required>
            </div>
            <div class="form-group">
                <label for="appointment-date">Appointment Date:</label>
                <input type="date" id="appointment-date" name="appointment_date" required>
            </div>
            <div class="form-group">
                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" name="contact_number" required>
            </div>
            <button type="submit">Book Test</button>
        </form>
        <h2>Booked Lab Tests</h2>
         </center>
        <ul id="booking-list">
            <?php
                // Database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "healthcare";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Add booking if form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $patient_name = $_POST['patient_name'];
                    $test_name = $_POST['test_name'];
                    $appointment_date = $_POST['appointment_date'];
                    $contact_number = $_POST['contact_number'];

                    // Prepare and bind
                    $stmt = $conn->prepare("INSERT INTO bookings (patient_name, test_name, appointment_date, contact_number) VALUES (?, ?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("ssss", $patient_name, $test_name, $appointment_date, $contact_number);
                        $stmt->execute();
                        $stmt->close();
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                    }
                }

                // Fetch bookings from the database
                $sql = "SELECT id, patient_name, test_name, appointment_date, contact_number FROM bookings";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($row["patient_name"]) . " - " . htmlspecialchars($row["test_name"]) . " - " . htmlspecialchars($row["appointment_date"]) . " - " . htmlspecialchars($row["contact_number"]) . "</li>";
                    }
                } else {
                    echo "<li>No bookings found</li>";
                }

                $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>
