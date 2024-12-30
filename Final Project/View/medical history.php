<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History Upload</title>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="emergency_contact.php">Emergency Contact</a></li>
                <li><a href="lab_test_booking.php">Lab Test Booking</a></li>
                <li><a href="faq_section.php">FAQ Section</a></li>
                <li><a href="notification_alerts.php">Notifications</a></li>
                <li><a href="medical_history_upload.php">Medical History Upload</a></li>
            </ul>
        </nav>
        <center>
            <h1>Upload Medical History</h1>
            <form id="upload-form" method="post" action="medical_history_upload.php" enctype="multipart/form-data">
                <div>
                    <label for="patient-name">Patient Name:</label>
                    <input type="text" id="patient-name" name="patient_name" required>
                </div>
                <div>
                    <label for="file">Upload Medical History File:</label>
                    <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.txt" required>
                </div>
                <button type="submit">Upload</button>
            </form>
        </center>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directory where files will be uploaded
    $uploadDir = 'uploads/';

    // Create the upload directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Sanitize and validate patient name
    $patientName = htmlspecialchars(trim($_POST['patient_name']));
    if (empty($patientName)) {
        die("Patient name is required.");
    }

    // Check if file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = basename($_FILES['file']['name']);
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allowed file types
        $allowedFileTypes = ['pdf', 'doc', 'docx', 'txt'];

        // Validate file type
        if (in_array($fileExtension, $allowedFileTypes)) {
            // Create a unique file name to avoid overwriting existing files
            $newFileName = $patientName . '-' . time() . '.' . $fileExtension;

            // Move the file to the upload directory
            $uploadFilePath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
                echo "File successfully uploaded: <a href='$uploadFilePath'>$newFileName</a>";
            } else {
                echo "Error moving the file.";
            }
        } else {
            echo "Invalid file type. Allowed types: " . implode(', ', $allowedFileTypes);
        }
    } else {
        echo "Error uploading the file.";
    }
}
?>
