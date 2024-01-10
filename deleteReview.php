<?php
session_start();
include "dbFunctions.php";

$theID = $_GET['reviewId'];

$query = "SELECT reviews.reviewId, movies.movieId, movies.movieTitle, users.username, review, rating, datePosted FROM reviews
            INNER JOIN movies ON movies.movieId = reviews.movieId
            INNER JOIN users ON users.userId = reviews.userId
             WHERE reviews.reviewID='$theID'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $id = $row['movieId'];
    $reviewId = $row ['reviewId'];
    $title = $row['movieTitle'];
    $username = $row['username'];
    $review = $row['review'];
    $rating = $row['rating'];
    $date = $row['datePosted'];
}
?>
<html>
    <head>
        <title>Edit Review</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <?php if (!empty($id)) { ?>
            <div class="container centered-form mt-5 narrow-form">
                <h2 class="text-center">Delete Review</h2>
                <div class="card">
                    <div class="card-body">
                        <b>Username:</b><br>
                        <?php echo $username; ?><br><br>
                        <b>Rating:</b><br>
                        <?php echo $rating ?><br><br>
                        <b>Comments:</b><br>
                        <?php echo $review ?><br>
                    </div>
                </div>
                <br>

                <form action="doDeleteReview.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $reviewId ?>"/>
                    <input type="hidden" name="movieid" value="<?php echo $id ?>"/>
                    <div class="text-center">
                        <button type="submit" value="delete" class="btn btn-primary">Delete Review</button>
                        <a href="reviews.php?movieId=<?php echo $id; ?>" class="mt-auto btn-primary btn">Cancel</a>
                    </div>
                </form> 
            </div>
        <?php } ?>

        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container">
                <span class="text-light">Copyright © Movie4U</span>
            </div>
        </footer>
    </body>
</html>
