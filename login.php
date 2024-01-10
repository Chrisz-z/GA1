<!DOCTYPE html>
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
            <h2 class="text-center">Login</h2>
            <br>
            <form action="doLogin.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <a href='register.php'>Do not have an account? Register Here</a>
            </div>
        </div>
        <br><br>
        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container">
                <span class="text-light">Copyright © Movie4U</span>
            </div>
        </footer>
    </body>
</html>
