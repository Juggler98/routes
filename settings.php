<?php
include './class/DBStorage.php';
include './class/Activity.php';

session_start();

$storage = new DBStorage();

if (isset($_POST['save'])) {
    $emailCollision = false;
    if ($_POST['email'] != $storage->getCredentials()[2]) {
        $emailCollision = $storage->checkIfRegistered($_POST['email']);
    }
    $success = $storage->changeCredentials($_POST['name'], $_POST['surname'], $_POST['email']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile settings</title>
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
        ?>
    </style>

</head>
<body class="bg-light">
<?php include 'navbar.html'; ?>

<div>
    <h1 class="page-title">Profile settings</h1>
</div>

<div class="profile-settings">
    <form method="post">
        <?php
        echo '<div class="form-group">
          <input type="name" class="form-control" id="name" name="name" value="' . $storage->getCredentials()[0] . '" pattern="[^' . ' ' . ']+"
              placeholder="Name" title="Name can not contain spaces." required>
    </div>
    <div class="form-group">
        <input type="name" class="form-control" id="surname" name="surname" value="' . $storage->getCredentials()[1] . '" pattern="[^' . ' ' . ']+"
              placeholder="Surname" title="Surname can not contain spaces." required>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" value="' . $storage->getCredentials()[2] . '"  placeholder="Email" required>
    </div>
    <div class="form-group">
        <button type="submit" name="save" class="btn btn-primary">Save</button>
    </div>
    </form>'
        ?>
        <form method="post">
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="oldPassword" placeholder="Old Password"
                       required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="newPassword" placeholder="New Password"
                       pattern=".{6,}"
                       title="Password must contain at least 6 characters." required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeatPassword" placeholder="Confirm Password"
                       required>
            </div>
            <div class="form-group">
                <button type="submit" name="passwordChanged" class="btn btn-primary">Change password</button>
            </div>
            <?php


            if (isset($_POST['save'])) {
                if ($emailCollision) {
                    echo '<div class="alert alert-danger">
                        Email address is already registered.
                        </div>';
                } else {
                    if ($success) {
                        echo '<div class="alert alert-success">
                        Credentials was changed.
                        </div>';
                    } else {
                        echo '<div class="alert alert-danger">
                        Credentials was not changed.
                        </div>';
                    }
                }

            }

            if (isset($_POST['passwordChanged'])) {
                if ($storage->checkPassword($_POST['oldPassword']) && $_POST['newPassword'] == $_POST['repeatPassword']) {
                    if ($storage->changePassword($_POST['newPassword'])) {
                        echo '<div class="alert alert-success">
                        Password was changed.
                        </div>';
                    } else {
                        echo '<div class="alert alert-danger">
                        Password was not changed.
                        </div>';
                    }
                } else {
                    if (!$storage->checkPassword($_POST['oldPassword'])) {
                        echo '<div class="alert alert-danger">
                    Old Password does not match.
                    </div>';
                    }
                    if ($_POST['newPassword'] != $_POST['repeatPassword']) {
                        echo '<div class="alert alert-danger">
                    Password confirmation does not match.
                    </div>';
                    }
                }
            }

            ?>
        </form>
</div>

</body>
</html>

