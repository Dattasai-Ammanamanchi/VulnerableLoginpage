<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Load XML data from file
    $xml = simplexml_load_file('users.xml');

    // Find the user with matching credentials
    $foundUser = false;
    foreach ($xml->user as $user) {
        if ($user->username == $username && $user->password == $password) {
            $foundUser = true;
            break;
        }
    }

    // Check if user credentials are valid
    if ($foundUser) {
        // Redirect to a welcome page after successful login
        header("Location: welcome.php?username=$username");
        exit;
    } else {
        // Display an error message for invalid credentials
        echo 'Invalid username or password.';
    }
}
?>
