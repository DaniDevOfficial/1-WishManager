<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $filename = 'loginData.json';
    $jsonData = file_get_contents('loginData.json');

    $data = json_decode($jsonData, true);


    if (!in_array($username, array_column($data, 'username'))) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $newAccountData = array('username' => $username, 'password' => $hashedPassword);

        $handle = @fopen($filename, 'r+');

        // create the file if needed
        if ($handle === null) {
            $handle = fopen($filename, 'w+');
        }

        if ($handle) {
            // seek to the end
            fseek($handle, 0, SEEK_END);

            // are we at the end of is the file empty
            if (ftell($handle) > 0) {
                // move back a byte
                fseek($handle, -1, SEEK_END);
                fwrite($handle, ',', 1); // add the trailing comma
                fwrite($handle, PHP_EOL . json_encode($newAccountData) . ']'); // add the new json string
            } else {
                // write the first event inside an array
                fwrite($handle, json_encode(array($newAccountData)));
            }

            // close the handle on the file
            fclose($handle);
        }
    } else {
        echo "An Account with this Username already exists. Please choose another one.";
    }
}


if ("qwasd" === "wasdasdasdfasdfasdf") {
    $_SESSION["username"] = $username;
    header("Location: account.php");

    exit;
} else {
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
        <h1>Create an Account</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <a href="login.php">Or Sign In </a>
    </body>

    </html>
    <?php

}
?>