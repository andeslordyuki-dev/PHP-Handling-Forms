<?php
session_start();

$message = ""; // Variable to hold the error message

// 1. Handle Logout Logic
if (isset($_POST['logout'])) {
    session_unset();    // Clear variables
    session_destroy();  // Kill session
}

// 2. Handle Login Logic
if (isset($_POST['login'])) {
    
    // CHECK: Is someone already logged in?
    if (isset($_SESSION['username'])) {
        // If yes, show the error message from your screenshot
        $message = $_SESSION['username'] . " is already logged in. Wait for him to logout to first";
    } else {
        // If no one is logged in, log the new user in
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($username) && !empty($password)) {
            $_SESSION['username'] = $username;
            // Create the hash to match the screenshot
            $_SESSION['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; font-size: 20px; padding: 20px; }
        .input-group { margin-bottom: 15px; }
        input { font-size: 18px; padding: 5px; width: 300px; }
        button { font-size: 20px; padding: 5px 15px; margin-top: 10px; cursor: pointer; display: block; }
        h1, h2, h3 { margin-bottom: 5px; }
    </style>
</head>
<body>

    <form method="POST" action="">
        <div class="input-group">
            Username <input type="text" name="username">
        </div>
        
        <div class="input-group">
            Password <input type="password" name="password">
        </div>

        <button type="submit" name="login">Login</button>
        <button type="submit" name="logout">Logout</button>
    </form>

    <br>

    <?php
    // Display the error message if it exists
    if ($message != "") {
        echo $message;
    }

    // Display User Info if logged in
    if (isset($_SESSION['username'])) {
        echo "<h2>User logged in: " . $_SESSION['username'] . "</h2>";
        
        echo "<h2>Password:</h2>";
        // Display the long hashed string
        echo "<h3>" . $_SESSION['password_hash'] . "</h3>";
    }
    ?>

</body>
</html>