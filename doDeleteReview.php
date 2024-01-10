<?php
include "dbFunctions.php";
$theID = $_POST['id'];
$movieId = $_POST['movieid'];


$msg = "";
$query = "DELETE FROM reviews
          WHERE reviewId = $theID";
$results = mysqli_query($link, $query) or die(mysqli_error($link));

if ($results) {
    $msg = "record successfully Deleted";
} else {
    $msg = "record not deleted";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
    </div>
</body>


</html>