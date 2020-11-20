<?php
include './class/DBStorage.php';
include './class/Activity.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
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
<body>
<nav class="navbar navbar-inverse navbar-expand-sm navbar-light my-navigationBar">
    <span class="navbar-brand">
        <i class="large material-icons">directions_run</i>
        Routes
    </span>

</nav>


<form class="sign-in" method="post">
    <div class="form-group">
    <label class="label h2">Register</label>
    </div>
    <div class="form-group">
        <input type="name" class="form-control" id="name" name="name" placeholder="Name" pattern="[^' ']+"
               title="Name can not contain spaces." required>
    </div>
    <div class="form-group">
        <input type="name" class="form-control" id="surname" name="surname" placeholder="Surname" pattern="[^' ']+"
               title="Surname can not contain spaces." required>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern=".{6,}"
               title="Password must contain at least 6 characters." required>
    </div>
    <div class="form-group">
        <button type="submit" name="sent" class="btn btn-primary">Register</button>
    </div>
    <p>Have an account? <a href="/tracking/login.php">Sign in</a>.</p>
    <?php

    $storage = new DBStorage();

    if (isset($_POST['sent'])) {
        if (!$storage->checkIfRegistered($_POST['email'])) {
            if ($storage->register($_POST['email'], $_POST['password'], $_POST['name'], $_POST['surname'])) {
                echo '<div class="alert alert-success">
                <strong>Success!</strong> You can Sign In.
                </div>';
            } else {
                echo '<div class="alert alert-danger">
             Registration failed.
            </div>';

            }
        } else {
            echo '<div class="alert alert-danger">
             Email address is already registered.
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

