<?php
include "dbFunctions.php";

$User_name = $_POST['username'];
$pass = $_POST['password'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$email = $_POST['email'];

$query = "INSERT INTO users(username, password, name, dob, email)
        VALUES ('$User_name','$pass','$name','$dob','$email')";

$result = mysqli_query($link, $query) or die('Error querying database');

mysqli_close($link);
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <body>
        <div class="container mt-5">
            <h2>Registration Successful</h2>
            <p>Thank you for registering! You can now log in using your username and password.</p>
            <a href="login.php" class="btn btn-primary">Log In</a>
        </div>
    </body>
</html>