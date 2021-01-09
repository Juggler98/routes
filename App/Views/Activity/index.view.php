

<?php
//include './class/DBStorage.php';
//include './class/Activity.php';
//include './class/Athlete.php';
//include './class/Club.php';

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
    <title>Activity Feed</title>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwdnlxB4C-bOkL_HqDe8a52r-E1pb6LdI&callback=initMap"
            defer
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../../../img/tabicon.PNG">

    <style>
        <?php
        include 'css/main.css';
        ?>
    </style>
</head>
<body class="bg-light">

<script>
    <?php include 'js/map.js';
    include 'js/activity.js';
    ?>
</script>

<?php include 'navbar.html'; ?>


<main role="main" class="bg-light">

    <div>
        <h1 class="page-title">Activity feed</h1>
    </div>

    <div class="album bg-light">
        <div class="container">
            <div class="row" id="activity">



            </div>
        </div>
    </div>

</main>

<!--<footer class="text-muted">-->
<!--    <div class="container">-->
<!--        <p class="float-right">-->
<!--            <a href="#">Back to top</a>-->
<!--        </p>-->
<!--    </div>-->
<!--</footer>-->

<script>
    <?php
    include 'scripts.html';
    ?>
</script>
</body>
</html>
