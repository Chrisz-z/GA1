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
                <h2 class="text-center">Edit Review</h2>
                <form action="doEditReview.php" method="post">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $theID ?>"/>
                            <input type="hidden" name="movieid" value="<?php echo $id ?>"/>
                            <div class="mb-3">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" disabled="true"/>
                            </div>
                            <label for="rating">Rating:</label>
                            <select class="form-control" id="rating" name="rating" required>
                                <option value= 5 <?php if ($rating == 5) echo "selected"; ?>>5 Stars</option>
                                <option value= 4 <?php if ($rating == 4) echo "selected"; ?>>4 Stars</option>
                                <option value= 3 <?php if ($rating == 3) echo "selected"; ?>>3 Stars</option>
                                <option value= 2 <?php if ($rating == 2) echo "selected"; ?>>2 Stars</option>
                                <option value= 1 <?php if ($rating == 1) echo "selected"; ?>>1 Star</option>
                            </select>
                            <br>
                            <label for="comments">Comments:</label>
                            <textarea class="form-control" id="comments" rows="3" name="comments" required><?php echo $review; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Review</button>
                        <a href="reviews.php?movieId=<?php echo $id; ?>" class="mt-auto btn-primary btn">Cancel</a>
                    </div>
                </form> 
            </div>
        <?php } ?>
    </body>
</html>
