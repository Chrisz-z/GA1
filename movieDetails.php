<?php
session_start();
include "dbFunctions.php";

$theID = $_GET['movieId'];

$query = "SELECT * FROM movies WHERE movieId=$theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $id = $row['movieId'];
    $title = $row['movieTitle'];
    $genre = $row['movieGenre'];
    $image = $row['picture'];
    $length = $row['runningTime'];
    $language = $row['language'];
    $director = $row['director'];
    $cast = $row['cast'];
    $synopsis = $row['synopsis'];
}
?>
<html class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Movie Website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="d-flex flex-column h-100">
        <?php include "navbar.php" ?>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-fluid movie-image" src="images/<?php echo $image; ?>" alt="<?php echo $title; ?>">
                </div>
                <div class="col-lg-6">
                    <h3><?php echo $title; ?></h3> <a href="reviews.php?movieId=<?php echo $id; ?>" class="mt-auto btn-primary btn-lg btn">Reviews</a>
                    <br><br>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Director: </strong><?php echo $director; ?></li>
                        <li class="list-group-item"><strong>Cast: </strong><?php echo $cast; ?></li>
                        <li class="list-group-item"><strong>Genre: </strong><?php echo $genre; ?></li>
                        <li class="list-group-item"><strong>Duration: </strong><?php echo $length; ?></li>
                        <li class="list-group-item"><strong>Language: </strong><?php echo $language; ?></li>
                    </ul><br>
                    <b>Synopsis:</b><br><?php echo $synopsis; ?>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container">
                <span class="text-light">Copyright © Movie4U</span>
            </div>
        </footer>
    </body>
</html>