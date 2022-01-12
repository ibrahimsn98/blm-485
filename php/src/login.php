<?php
    session_start();
    include 'mysql_connect.php';
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
            if (isset($_POST["email"]) || isset($_POST["password"])) {

                $email = strip_tags(trim($_POST["email"]));
                $password = strip_tags(trim($_POST["password"]));

                $sql = "SELECT * FROM users WHERE email='".$email."' LIMIT 1";

                if ($result = $conn->query($sql)) {
                    $found_user = $result->fetch_object();

                    if (empty($found_user)) {
                        echo "<div class='alert alert-danger' role='alert'>Your email or password is wrong!.</div>";
                    } else if ($found_user->password != md5($password)) {
                        echo "<div class='alert alert-danger' role='alert'>Your email or password is wrong!.</div>";
                    } else {
                        $_SESSION["logged_in"] = true;
                        $_SESSION["id"] = $found_user->id;
                        echo '<script>window.location = "index.php";</script>';
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>An error occurred. ".$conn->error()."</div>";
                }
            }
            ?>

            <div class="box">
                <h4>Login to Watched</h4>
                <br>
                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <br>
                    <center><a href="register.php">Create an account</a></center>
                </form>
            </div>
        </div>
    </body>
</html>