<?php
session_start();
// Destroy session
if (session_destroy()) {
    // Redirecting To Home Page
    header("Location: login");
}
?>

<!DOCTYPE html>

<head>
    <title>Logout</title>
    <link rel="stylesheet" href="output.css">
</head>

<body class="bg-match">
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