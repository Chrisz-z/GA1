<?php
session_start();
include "dbFunctions.php";

$query = "SELECT * FROM movies";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
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
        <?php
        if (isset($_SESSION['userId'])) {
            ?>
            <br>
            <header class = "jumbotron jumbotron-fluid">
                <div class = "container">
                    <h1 class = "display-4">Welcome to Movie4U, <?php echo $_SESSION['username'] ?>!</h1>
                    <p class = "lead">Discover the latest movies and TV shows.</p>
                </div>
            </header>
            <br>
            <?php
        } else {
            ?>
            <br><br>
            <header class = "jumbotron jumbotron-fluid">
                <div class = "container">
                    <h1 class = "display-4">Welcome to Movie4U!</h1>
                    <p class = "lead">Discover the latest movies and TV shows.</p>
                </div>
            </header>
            <?php
        }
        ?>     


        <div class="container">
            <div class="row">
                <?php
                for ($i = 0; $i < count($arrContent); $i++) {
                    $id = $arrContent[$i]['movieId'];
                    $title = $arrContent[$i]['movieTitle'];
                    $genre = $arrContent[$i]['movieGenre'];
                    $image = $arrContent[$i]['picture'];
                    $length = $arrContent[$i]['runningTime'];
                    $language = $arrContent[$i]['language'];
                    $director = $arrContent[$i]['director'];
                    $cast = $arrContent[$i]['cast'];
                    $synopsis = $arrContent[$i]['synopsis'];
                    ?>
                    <?php if (!empty($id)) { ?>
                        <div class="col-md-2 mx-auto">
                            <div class="card h-100">
                                <img style="width:auto" src="images/<?php echo $image; ?>"</img>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo $title ?></h5>
                                    <p class="card-text"><?php echo $length ?></p>
                                    <a type="button" href="movieDetails.php?movieId=<?php echo $id; ?>" class="mt-auto btn-primary btn-lg btn ">More Details</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container">
                <span class="text-light">Copyright © Movie4U</span>
            </div>
        </footer>
    </body>
</html>