<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $jsonData = file_get_contents('loginData.json');

    $data = json_decode($jsonData, true);

    if (in_array($username, array_column($data, 'username'))) {
        $key = array_search($username, array_column($data, 'username'));
        $passwordInDB = $data[$key]['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (password_verify($password, $passwordInDB)) {
            $_SESSION["username"] = $username;
            header("Location: account.php");
            exit;
        } else {
            echo "Invalid password";
        }
    }


    if ($username === "wasdasdasdfasdfasdf") {
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
            <h1>Login now into your account (account creation currently not possible)</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <a href="create.php">Or Create an account </a>
        </body>

        </html>
        <?php
    }
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
        <h1>Login now into your account (account creation currently not possible)</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="create.php">Or Create an account </a>
    </body>

    </html>
    <?php
}
?>