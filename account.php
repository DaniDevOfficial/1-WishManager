<?php
// Start the session
session_start();
var_dump($_SESSION);

// Check if the username is set in the session
if (isset($_SESSION["username"])) {
    // Get the username from the session
    $username = $_SESSION["username"];
    // Display the welcome message
    echo "Welcome back, $username!";
} else {
    // If the username is not set in the session, redirect the user to the login page
    exit; // Stop further execution of the script
}
?>