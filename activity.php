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
    <title>Activity</title>
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
<body>

<script>
    <?php include 'js/activitymap.js';
    ?>
</script>


<?php include 'navbar.html'; ?>

<div class="bg-light">

    <div class="album py-5">
        <div class="container">

            <div class="row">
                <div id="id"></div>
                <?php
                $storage = new DBStorage();
                $activities = $storage->loadAllActivities();


                echo '<div class="col">
                    <div class="card mb-4 box-shadow">
                        
                        <div class="card-body">
                            <div class="card-text">';
                echo 'Adam Belianský' . '</div>
                            <p class="text-muted">'
                    . '7.11.2020 21:39' .
                    '<p class="card-text">'
                    . 'Afternoon ride' . '</p>
                            <div class="stats">' . '

                                <div>
                                    <p>Distance<br /><span id="distance">25.2 km</span></p>
                                </div>

                                <div>
                                    <p>Speed<br />12.1 km/h</p>
                                </div>

                                <div>
                                    <p>Time<br />1h 56m</p>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Rename</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>';

                ?>

            </div>
        </div>
    </div>

    <div class="odsadenie">

        <div id="map" class="col-8 activitymap odsadenie"></div>
    </div>
</div>

<script src="js/activityDetails.js"></script>

</body>
</html>
