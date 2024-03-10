<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the POST data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username and password are equal
    if ($username === $password) {
        echo "Login successful!";
        // Display the welcome message if login is successful
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">

            <title>Logged in</title>
        </head>

        <body>
            <h1>Welcome back
                <?php echo $username; ?>!
            </h1>
        </body>

        </html>
        <?php
    } else {
        echo "Wrong username or password.";
    }
} else {
    // Display the login form if the form is not submitted via POST
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Login</title>
    </head>

    <body>
        <h1>Login now into your account (account creation currently not possible)</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </body>

    </html>
    <?php
}
?>