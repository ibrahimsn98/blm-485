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

    $user_sql = "SELECT * FROM users WHERE id='".$user_id."' LIMIT 1";
    $user = $conn->query($user_sql)->fetch_object();

    // Prevent deletion if current user is not an admin.
    if ($user->admin != 1) {
        header("location: index.php");
        exit;
    }

    $sql = "DELETE FROM movies WHERE id = '".$movie_id."'";
    $conn->query($sql);

    header("location: index.php");
    exit;
