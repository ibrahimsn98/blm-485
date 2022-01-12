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
            .card {
                margin-bottom: 20px;
            }
            p.content {
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 6;
                line-clamp: 6;
                -webkit-box-orient: vertical;
            }
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
            <h2>My Watched Movies</h2>
            <br>
            <div class="row">
                <?php
                    include 'mysql_connect.php';

                    $user_id = $_SESSION["id"];
                    $watched_array = array();
                    $watched_sql = "SELECT movie_id FROM watches WHERE user_id = '".$user_id."'";
                    $watched = $conn->query($watched_sql);
                    while ($data = $watched->fetch_object()) $watched_array[] = $data->movie_id;

                    $movies_sql = "SELECT * FROM movies WHERE id IN (" . implode(',', $watched_array) . ")";

                    if ($movies = $conn->query($movies_sql)) {
                        while ($data = $movies->fetch_object()) {
                            echo '<div class="col-sm-3">';
                            echo '<div class="card">';
                            echo '<img height="400" src="'.$data->image.'" class="card-img-top">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$data->name.'</h5>';
                            echo '<h6 class="card-subtitle mb-2 text-muted">'.$data->genres.'</h6>';
                            echo '<p class="card-text content">'.$data->description.'</p>';
                            echo '<a href="remove_movie.php?movie_id='.$data->id.'">Remove</a>';
                            echo ' ';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>