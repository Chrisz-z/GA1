<?php
include "dbFunctions.php";
$theID = $_POST['id'];
$movieID = $_POST['movieid'];
$rating = $_POST['rating'];
$review = $_POST['comments'];

$msg = "";
$query = "UPDATE reviews
          Set rating='$rating', review='$review'
          WHERE reviewId = $theID";
$results = mysqli_query($link, $query) or die(mysqli_error($link));

if ($results) {
    $msg = "record successfully updated";
} else {
    $msg = "record not updated";
}
?>
<!DOCTYPE html>
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
        <div class="container centered-form mt-5 narrow-form">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"><?php echo $msg; ?></h3>
                    <br>
                    <div class="text-center">
                    <a href="reviews.php?movieId=<?php echo $movieID; ?>" class="btn btn-primary btn-block">Back to Reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>