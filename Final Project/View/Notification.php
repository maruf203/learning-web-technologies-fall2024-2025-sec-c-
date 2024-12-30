<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Alerts</title>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="emergency_contact.php">Emergency Contact</a></li>
                <li><a href="lab_test_booking.php">Lab Test Booking</a></li>
                <li><a href="faq_section.php">FAQ Section</a></li>
                <li><a href="medical_history_upload.php">Medical History Upload</a></li>
                <li><a href="notification_alerts.php">Notifications</a></li>
            </ul>
        </nav>
        <center>
            <h1>Create Notification</h1>
            <form id="notification-form" method="post" action="notification_alerts.php">
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit">Create Notification</button>
            </form>
            <h2>Notifications</h2>
            <ul id="notification-list">
                <?php
                // Path to the file where notifications will be stored
                $filePath = 'notifications.txt';

                // Check if form is submitted
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = htmlspecialchars(trim($_POST['title']));
                    $message = htmlspecialchars(trim($_POST['message']));

                    // Validate inputs
                    if (!empty($title) && !empty($message)) {
                        // Append the notification to the file
                        $notification = $title . " - " . $message . "\n";
                        file_put_contents($filePath, $notification, FILE_APPEND | LOCK_EX);
                    } else {
                        echo "Both title and message are required.";
                    }
                }

                // Read and display notifications
                if (file_exists($filePath)) {
                    $notifications = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach ($notifications as $notification) {
                        echo "<li>" . htmlspecialchars($notification) . "</li>";
                    }
                } else {
                    echo "<li>No notifications found.</li>";
                }
                ?>
            </ul>
        </center>
    </div>
</body>
</html>
