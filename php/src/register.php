<?php
    session_start();
    if(isset($_SESSION["logged_in"])){
        header("location: index.php");
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
        <div class="container">
            <?php
                if (isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["password"])) {

                    $name = strip_tags(trim($_POST["name"]));
                    $email = strip_tags(trim($_POST["email"]));
                    $password = strip_tags(trim($_POST["password"]));

                    if (empty($name)) {
                        echo "<div class='alert alert-danger' role='alert'>Please provide a valid name.</div>";
                    } else if (empty($email)) {
                        echo "<div class='alert alert-danger' role='alert'>Please provide a valid email.</div>";
                    } else if (empty($password)) {
                        echo "<div class='alert alert-danger' role='alert'>Please provide a valid password.</div>";
                    } else {
                        include 'mysql_connect.php';

                        $md5_password = md5($password);
                        $sql = "INSERT INTO users (name, email, password) VALUES ('".$name."','".$email."','".$md5_password."')";

                        if ($conn->query($sql)) {
                            $_SESSION["logged_in"] = true;
                            $_SESSION["id"] = $conn->insert_id;
                            echo '<script>window.location = "index.php";</script>';
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>An error occurred. ".$conn->error."</div>";
                        }
                    }
                }
            ?>

            <div class="box">
                <h4>Create New Account</h4>
                <br>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Create New Account</button>
                    </div>
                    <br>
                    <center><a href="login.php">I already have an account</a></center>
                </form>
            </div>

        </div>
    </body>
</html>