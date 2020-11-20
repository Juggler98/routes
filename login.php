<?php
include './class/DBStorage.php';
include './class/Activity.php';

session_start();
session_destroy();

$storage = new DBStorage();

if (isset($_POST['sent'])) {
    if ($storage->checkUser($_POST['email'], $_POST['password'])) {
        header("Location: /tracking/index.php");
        exit();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwdnlxB4C-bOkL_HqDe8a52r-E1pb6LdI&callback=initMap"
            defer
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="img/tabicon.PNG">

    <style>
        <?php
        include 'css/main.css';
        include 'css/album.css';
        ?>
    </style>

</head>
<body class="bg-light">
<nav class="navbar navbar-inverse navbar-expand-sm navbar-light my-navigationBar">
    <span class="navbar-brand">
        <i class="large material-icons">directions_run</i>
        Routes
    </span>

</nav>


<form class="sign-in" method="post">
    <div class="form-group">
    <label class="label h2">Log in</label>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <button type="submit" value="login" name="sent" class="btn btn-primary">Log in</button>
    </div>
    <p>Don't have an account? <a href="/tracking/register.php">Sign up</a>.</p>
    <?php

    $storage = new DBStorage();

    if (isset($_POST['sent'])) {
        if (!$storage->checkUser($_POST['email'], $_POST['password'])) {
                echo '<div class="alert alert-danger">
             Your password or email is incorrect.
            </div>';

            }
    }

    ?>
</form>




<script>
    <?php
    include 'scripts.html';
    ?>
</script>
</body>
</html>

