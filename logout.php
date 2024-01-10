<?php
session_start();
if (isset($_SESSION['userId'])) {
    session_destroy();
    $_SESSION = array();
}
$message = "You have logged out.";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
        <title>Movies</title>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="container centered-form mt-5 narrow-form">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"><?php echo $message; ?></h3>
                    <br>
                    <div class="text-center">
                        <a href="movielist.php" class="btn btn-primary btn-block">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>