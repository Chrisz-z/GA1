<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .centered-form {
        align-items: center;
    }
    .narrow-form {
        max-width: 400px;
        margin: 0 auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

</style>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="movielist.php">Movie4U</a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <?php
                if (isset($_SESSION['userId'])) {
                    ?>
                    <li class="nav-item"> <a class="nav-link" href="movielist.php">Movies</a></li>
                    <li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a></li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item"> <a class="nav-link" href="movielist.php">Movies</a></li>
                    <li class="nav-item"> <a class="nav-link" href="login.php">Login</a></li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>
