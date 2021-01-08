<?php
include './class/DBStorage.php';
include './class/Activity.php';
include './class/Athlete.php';

session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    header("Location: /tracking/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Athletes</title>
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

<div class="odsadenie">

    <div>
        <h1 class="page-title">Athletes</h1>
    </div>

    <form method="post">
    <ul class="list-group list-width">

            <?php

            $storage = new DBStorage();
            $athletes = $storage->loadAllAthletes();

            if (isset($_POST['id'])) {
                if ($athletes[$_POST['id']-1]->getFollowing()) {
                    $storage->unfollow($_POST['id']);
                } else {
                    $storage->follow($_POST['id']);
                }
            }

            $athletes = $storage->loadAllAthletes();

            $id = 1;
            /** @var Athlete $athlete */
            foreach ($athletes as $athlete) {
                echo '<li class="list-group-item" style="min-height: 64px">' . $athlete->getName() . ' ' . $athlete->getSurname();
                if ($athlete->getId() == $_SESSION['id']) {
                    echo '';
                } else {
                    if ($athlete->getFollowing()) {
                        echo '<button type="submit" value="'.$id.'" name="id" class="btn btn-danger btn-ath">Unfollow</button></li>';
                    } else {
                        echo '<button type="submit" value="'.$id.'" name="id" class="btn btn-success btn-ath">Follow</button></li>';
                    }
                }
                ++$id;
            }




            ?>

    </ul>
    </form>
</div>

<script>
    <?php
    include 'scripts.html';
    ?>
</script>


</body>
</html>

