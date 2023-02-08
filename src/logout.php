<?php
session_start();
// Destroy session
if (session_destroy()) {
    // Redirecting To Home Page
    header("Location: login.php");
}
?>

<!DOCTYPE html>

<head>
    <title>Logout</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Logout</h1>
                <p>Logout successful.</p>
            </div>
        </div>
    </div>
</body>

</html>