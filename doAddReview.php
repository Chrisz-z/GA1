<?php
session_start();
include "dbFunctions.php";

// Check if the user is logged in
if (!isset($_SESSION['userId'])) {
    // Redirect to the login page or show an error message
    header("Location: login.php");
    exit;
}

// Get the review data from the form
$movieId = $_POST['movieId'];
$rating = $_POST['rating'];
$review = $_POST['comments'];
$userId = $_SESSION['userId']; // Assuming you have the userId in the session

// Validate the review data (you can add more validation as per your requirements)

// Insert the review into the database
$query = "INSERT INTO reviews (movieId, userId, rating, review, datePosted) 
          VALUES ('$movieId', '$userId', '$rating', '$review', NOW())";

$result = mysqli_query($link, $query);

if ($result) {
    $msg = "Review successfully added";
} else {
    $msg = "Failed to add the review";
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Review Status</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="container centered-form mt-5 narrow-form">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"><?php echo $msg; ?></h3>
                    <br>
                    <div class="text-center">
                    <a href="reviews.php?movieId=<?php echo $movieId; ?>" class="btn btn-primary btn-block">Back to Reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
