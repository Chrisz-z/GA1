<!DOCTYPE html>
<?php
session_start();
include "dbFunctions.php";
$theID = $_GET['movieId'];
?>
<html class="h-100">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="d-flex flex-column h-100">
        <?php include "navbar.php" ?>
        <div class="container centered-form mt-5 narrow-form">
            <h2 class="text-center">Review</h2>
            <br>
            <form action="doAddReview.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="movieId" value="<?php echo $theID; ?>">
                        <div class="mb-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo ($_SESSION['username']) ?>" disabled>
                        </div>
                        <label for="rating">Rating:</label>
                        <select class="form-control" id="rating" name="rating" required>
                            <option value= 5 >5 Stars</option>
                            <option value= 4 >4 Stars</option>
                            <option value= 3 >3 Stars</option>
                            <option value= 2 >2 Stars</option>
                            <option value= 1 >1 Star</option>
                        </select>
                        <br>
                        <label for="comments">Comments:</label>
                        <textarea class="form-control" id="comment" rows="3" name="comments" required></textarea>

                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="mt-auto btn btn-primary">Submit Review</button>
                    <a href="reviews.php?movieId=<?php echo $theID; ?>" class="mt-auto btn-primary btn">Cancel</a>
                </div>
            </form>
        </div>
        <br><br>
        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container">
                <span class="text-light">Copyright © Movie4U</span>
            </div>
        </footer>
    </body>
</html>
