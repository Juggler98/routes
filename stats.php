<?php
include './class/DBStorage.php';
include './class/Activity.php';

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
    <title>My Stats</title>
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

<script src="js/stats.js"></script>

<?php include 'navbar.html'; ?>


<div class="bg-light">

    <div>
        <h1 class="page-title">My Stats</h1>
    </div>

    <div class="odsadenie">

        <div class="page-title">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-light active">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Run
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Bike
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Hike
                </label>
            </div>
        </div>

        <div class="container">

            <?php

            $storage = new DBStorage();
            $activities = $storage->loadAllActivities();

            ?>

            <table class="table table-striped stats-table">
                <thead>
                <tr>
                    <th scope="col" class="table-title d-flex justify-content-start"><a href="/tracking/stats.php/?year=
                    <?php
                        if (!isset($_GET['year'])) {
                            $_GET['year'] = date("Y");
                        }
                        echo $_GET['year'] - 1;
                        ?>
                    " class="material-icons">
                            navigate_before
                        </a> <i>
                            <?php
                            echo $_GET['year'];
                            ?>
            </i> <a href="/tracking/stats.php/?year=
                        <?php
            echo $_GET['year'] + 1;
            ?>
                        " class="material-icons">
                navigate_next
            </a></th>
            </tr>
            </thead>
            <tbody>

            <?php

            $distance = 0;
            $time = 0;
            $elevation = 0;
            $count = 0;
            /** @var Activity $activity */
            foreach ($activities as $activity) {
                if ($activity->getYear() == $_GET['year']) {
                    $distance += $activity->getDistance();
                    $time += $activity->getTime();
                    $elevation += $activity->getElevation();
                    $count++;
                }
            }
            $time /= 3600;
            $time = floor($time * 10) / 10;


            ?>


            <tr>
                <td>Distance</td>
                <?php echo '<td id="distance">' . $distance . 'km</td>' ?>
            </tr>
            <tr>
                <td>Time</td>
                <?php echo '<td>' . $time . ' h</td>' ?>
            </tr>
            <tr>
                <td>Elev. Gain</td>
                <?php echo '<td>' . $elevation . ' m</td>' ?>
            </tr>
            <tr>
                <td>Runs</td>
                <?php echo '<td>' . $count . '</td>' ?>
            </tr>
            </tbody>
            </table>
        </div>
        <div class="odsadenie">
            <table class="table table-striped stats-table">
                <thead>
                <tr>
                    <th scope="col" class="table-title">All time</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $distance = 0;
                $time = 0;
                $elevation = 0;
                $count = 0;
                /** @var Activity $activity */
                foreach ($activities as $activity) {
                    $distance += $activity->getDistance();
                    $time += $activity->getTime();
                    $elevation += $activity->getElevation();
                }
                $time /= 3600;
                $time = floor($time * 10) / 10;
                ?>

                <tr>
                    <td>Distance</td>
                    <?php echo '<td id="distance">' . $distance . 'km</td>' ?>
                </tr>
                <tr>
                    <td>Time</td>
                    <?php echo '<td>' . $time . ' h</td>' ?>
                </tr>
                <tr>
                    <td>Elev. Gain</td>
                    <?php echo '<td>' . $elevation . ' m</td>' ?>
                </tr>
                <tr>
                    <td>Runs</td>
                    <?php echo '<td>' . sizeof($activities) . '</td>' ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    <?php
    include 'scripts.html';
    ?>
</script>

</body>
</html>
