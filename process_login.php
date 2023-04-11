<?php

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "lait_hr");

if (!$con) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}

// Get the user's credentials from the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Find the user's record in the database
$query = "SELECT * FROM admin_creds WHERE username = '$username'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 1) {
    // If the user exists, check the password
    $row = mysqli_fetch_assoc($result);
    var_dump($password, $row);
    $hashed_password = $row['password'];
    if (password_verify($password, $hashed_password)) {
        // If the password is correct, log the user in
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['admin'] = true;
        header('Location: admin_landing.php');
    } else {
        // If the password is incorrect, display an error message
        echo "Incorrect password";
    }
} else {
    // If the user does not exist, display an error message
    echo "User not found";
}

// Close the database connection
mysqli_close($con);

?>
