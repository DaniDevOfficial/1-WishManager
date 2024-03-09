<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the POST data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Now you have the username and password, you can proceed with authentication logic here
    // For example, you could check the username and password against a database of users

    // For demonstration purposes, let's just echo the username and password back
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
} else {
    // If the form is not submitted via POST, display an error message
    echo "Error: Form data not submitted.";
}
?>
