<?php
session_start();
include "dbFunctions.php";

// Check if the user is logged in
if (!isset($_SESSION['userId'])) {
// Redirect to the login page or show an error message
    header("Location: login.php");
    exit;
}
$theID = $_GET['movieId'];

$query = "SELECT reviews.reviewId, movies.movieTitle, users.username, review, rating, datePosted, reviews.userId 
          FROM reviews
          INNER JOIN movies ON movies.movieId = reviews.movieId
          INNER JOIN users ON users.userId = reviews.userId
          WHERE movies.movieId='$theID'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

$arrContent = array();
while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Movie Website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="container my-5">
            <?php if (!empty($arrContent)) : ?>
                <h1>Reviews for <?php echo $arrContent[0]['movieTitle']; ?></h1>
                <table>
                    <tr>
                        <th>Review by</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($arrContent as $row) : ?>
                        <?php
                        // Check if the logged-in user owns the review
                        $canEditDelete = $_SESSION['userId'] == $row['userId'];
                        ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['review']; ?></td>
                            <td><?php echo $row['rating']; ?></td>
                            <td><?php echo $row['datePosted']; ?></td>
                            <?php if ($canEditDelete) : ?>
                                <td><a href="editReview.php?reviewId=<?php echo $row['reviewId']; ?>">Edit</a></td>
                                <td><a href="deleteReview.php?reviewId=<?php echo $row['reviewId']; ?>">Delete</a></td>
                            <?php else : ?>
                                <td></td>
                                <td></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <h1>No Reviews Found</h1>
            <?php endif; ?>
            <br><br>
            <a href="addReviews.php?movieId=<?php echo $theID; ?>" class="mt-auto btn-primary btn">Add a review</a>
            <a href="movieDetails.php?movieId=<?php echo $theID; ?>" class="mt-auto btn-primary btn">Cancel</a>
        </div>


 
        <footer class="footer py-3 bg-dark" style="margin-top: 300px">
            <div class="container">
                <span class="text-light">Copyright © Movie4U</span>
            </div>
        </footer>

    </body>
</html>
