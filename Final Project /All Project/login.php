<?php
session_start();

// Redirect to welcome page if already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: welcome.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate input fields
    if (empty($_POST["Email"])) {
        $errors[] = "Email is required.";
    }
    if (empty($_POST["Password"])) {
        $errors[] = "Password is required.";
    }

    // Check credentials
    if (empty($errors)) {
        $storedUser = $_SESSION["user"] ?? null;
        if ($storedUser && $storedUser["Email"] === $_POST["Email"] && $storedUser["Password"] === $_POST["Password"]) {
            $_SESSION["loggedin"] = true;
            header("Location: welcome.php");
            exit();
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: inline-block;
            margin-top: 150px;
        }
        ul {
            list-style: none;
            padding: 0;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login Form</h1>
        <?php if (!empty($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="POST" action="">
            <div>
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email"><br><br>
            </div>
            <div>
                <label for="Password">Password:</label>
                <input type="password" id="Password" name="Password"><br><br>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
