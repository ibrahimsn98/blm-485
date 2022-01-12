<?php

    $host = 'db';
    $user = 'root';
    $pass = 'MYSQL_ROOT_PASSWORD';
    $database = 'movies';

    $conn = new mysqli($host, $user, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
