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
    <title>Activity Calendar</title>
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

<div class="album bg-light odsadenie">

    <div class="container">
        <div class="row">
                <h1 class="page-title-calendar float-left"><a href="/tracking/calendar.php/?year=
                    <?php
                    if (!isset($_GET['year'])) {
                        $_GET['year'] = date("Y");
                    }
                    echo $_GET['year'] - 1;
                    ?>
                    " class="material-icons">
                        navigate_before
                    </a>
                    <?php
                    echo $_GET['year'];
                    ?>
                    <a href="/tracking/calendar.php/?year=
                        <?php
                    echo $_GET['year'] + 1;
                    ?>
                        " class="material-icons">
                        navigate_next
                    </a></h1>
            <div>
                <h1 class="page-title float-right">Training calendar</h1>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">

            <?php

            $storage = new DBStorage();
            $activities = $storage->loadAllActivities();

            $months = array("JAN", "FEB", "MAR", "APR", "MAJ", "JUN", "JUL", "AUG", "SEP", "OKT", "NOV", "DEC");

            $distance = array(12);
            $time = array(12);
            $count = array(12);

            for ($i = 0; $i < 12; $i++) {
                $distance[$i] = 0;
                $time[$i] = 0;
                $count[$i] = 0;
            }

            /** @var Activity $activity */
            foreach ($activities as $activity) {
                if ($activity->getYear() == $_GET['year']) {
                    for ($i = 0; $i < sizeof($months); ++$i) {
                        if (strtolower($months[$i]) == strtolower($activity->getMonth())) {
                            $distance[$i] += $activity->getDistance();
                            $time[$i] += $activity->getTime();
                            $count[$i]++;
                        }
                    }
                }
            }

            for ($i = 0; $i < 12; $i++) {
                $time[$i] /= 3600;
                $time[$i] = floor($time[$i] * 100) / 100;
            }

            for ($i = 0; $i < 12; $i++) {

                echo '<div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card mb-4 box-shadow">
                       
                        <div class="card-body">
                            <div class="card-text">' .
                    $months[$i] . '</div><br />
                            <div class="stats">' . '

                                <div>
                                    <p style="font-size: inherit">KILOMETERS<br />'
                                    . $distance[$i] .'</p>
                                </div>

                                <div>
                                    <p>HOURS<br />'. $time[$i] .'</p>
                                </div>

                                <div>
                                    <p>ACTIVITIES<br />'. $count[$i] .'</p>
                                </div>

                            </div>
                         
                        </div>
                    </div>
                </div>';

            }
            ?>

        </div>
    </div>
</div>

</body>
</html>

