<?php
    session_start();
    if(!isset($_SESSION["logged_in"])){
        header("location: login.php");
        exit;
    }
?>
<html lang="en">
    <head>
        <title>Movies</title>
        <link href="./static/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .box { width: 320px; margin: 100px auto; }
            .alert { margin-top: 20px; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Watched</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Movie Directory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_movies.php">My Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_movie.php">New Movie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="container">
            <?php
            if (isset($_POST["name"]) || isset($_POST["description"]) || isset($_POST["image_url"]) || isset($_POST["genres"])) {

                $name = strip_tags(trim($_POST["name"]));
                $description = strip_tags(trim($_POST["description"]));
                $image_url = strip_tags(trim($_POST["image_url"]));
                $genres = strip_tags(trim($_POST["genres"]));

                if (empty($name)) {
                    echo "<div class='alert alert-danger' role='alert'>Please provide a valid name.</div>";
                } else if (empty($description)) {
                    echo "<div class='alert alert-danger' role='alert'>Please provide a valid description.</div>";
                } else if (empty($image_url)) {
                    echo "<div class='alert alert-danger' role='alert'>Please provide a valid image url.</div>";
                }  else if (empty($genres)) {
                    echo "<div class='alert alert-danger' role='alert'>Please provide a valid genre.</div>";
                } else {
                    include 'mysql_connect.php';

                    $sql = "INSERT INTO movies (name, description, image, genres) VALUES ('".$name."','".$description."','".$image_url."', '".$genres."')";

                    if ($conn->query($sql)) {
                        echo '<script>window.location = "index.php";</script>';
                    } else {
                        echo "An error occurred. ".$conn->error;
                    }
                }
            }
            ?>
            <div class="box">
                <h4>Add New Movie</h4>
                <br>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Movie Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image Url</label>
                        <input type="text" class="form-control" id="image_url" name="image_url">
                    </div>
                    <div class="mb-3">
                        <label for="genres" class="form-label">Genres</label>
                        <input type="text" class="form-control" id="genres" name="genres">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Add Movie</button>
                    </div>
                    <br>
                    <center><a href="index.php">Back to the movie list</a></center>
                </form>
            </div>
        </div>
    </body>
</html>