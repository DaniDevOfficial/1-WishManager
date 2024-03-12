<?php
// Start the session
session_start();

// Check if the username is set in the session
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $datafile = file_get_contents('ToDoData.json');
    $data = json_decode($datafile, true);
    $key = array_search($username, array_column($data, 'username'));
    $user = null;
    foreach ($data['users'] as $userData) {
        if ($userData['username'] === $username) {
            $user = $userData;
            break;
        }
    }
    
    if ($user !== null) {
    } else {
        echo "User not found!";
    }

    $html = '';
if ($user !== null) {
    $html .= '<ul>';
    foreach ($user['todos'] as $todo) {
        $html .= '<li>';
        $html .= '<h3>' . $todo['title'] . '</h3>';
        $html .= '<p>Description: ' . $todo['description'] . '</p>';
        $html .= '<p>Due Date: ' . $todo['due_date'] . '</p>';
        $html .= '<p>Priority: ' . $todo['priority'] . '</p>';
        $html .= '<p>Completed: ' . ($todo['completed'] ? 'Yes' : 'No') . '</p>';
        $html .= '</li>';
    }
    $html .= '</ul>';
} else {
    $html = "User not found!";
}

echo $html;


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Account</title>
    </head>

    <body>
        <h1>Welcome <?php echo $username; ?> to your account</h1>
        <a href="index.html">Logout</a>

        <ul>
            
        </ul>
    </body>

    </html>
    <?php
} else {
    // If the username is not set in the session, redirect the user to the login page
    exit; // Stop further execution of the script
}
?>