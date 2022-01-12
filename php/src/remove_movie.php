<?php
    session_start();

    if(!isset($_SESSION["logged_in"])){
        header("location: login.php");
        exit;
    }
    if (!isset($_GET["movie_id"])) {
        header("location: index.php");
        exit;
    }

    include 'mysql_connect.php';

    $user_id = $_SESSION["id"];
    $movie_id = strip_tags(trim($_GET["movie_id"]));

    $sql = "DELETE FROM watches WHERE user_id = '".$user_id."' AND movie_id = '".$movie_id."'";
    $conn->query($sql);

    header("location: my_movies.php");
    exit;
