<?php

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "lait_hr");

if (!$con) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}

// Get the user's information from the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate the user's input
$errors = array();
if (empty($username)) {
    $errors[] = "Username is required";
}
if (empty($email)) {
    $errors[] = "Email is required";
}
if (empty($password)) {
    $errors[] = "Password is required";
}
if ($password != $confirm_password) {
    $errors[] = "Passwords do not match";
}

// If there are errors, display them and do not insert the user's information into the database
if (count($errors) > 0) {
    echo "Errors: <br>";
    foreach ($errors as $error) {
        echo "- " . $error . "<br>";
    }
} else {
    // If there are no errors, insert the user's information into the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO admin_creds (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if (mysqli_query($con, $query)) {
        echo "Sign up successful";
        header('Location: login.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);

?>
