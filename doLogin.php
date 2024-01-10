<?php
session_start();
$msg = "";

// Check whether session variable 'userId' is set
if (isset($_SESSION['userId'])) {
    $msg = "You are already logged in.";
} else { // User is not logged in
    // Check whether form input 'username' contains a value
    if (isset($_POST['username'])) {
        // Retrieve form data
        $entered_username = $_POST['username'];
        $entered_password = $_POST['password'];

        // Connect to the database
        include("dbFunctions.php");

        // Match the username and password entered with the database record
        $query = "SELECT userId, username FROM users 
                  WHERE username ='$entered_username' AND 
                  password = ('$entered_password')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        // If record is found, store id and username into session
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['username'] = $row['username'];

            // Redirect the user to the movie list page or any other page you desire after successful login
            header("location: movielist.php");
            exit;
        } else { // Record not found
            $msg = "Sorry, you must enter a valid username and password to log in.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Movie</title>
</head>
<body>
    <?php include "navbar.php" ?>
    <div class="container">
        <?php
        echo $msg;
        ?>
        <br>
        <a href="login.php">Please try again</a>
    </div>
</body>
</html>
