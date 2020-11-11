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
    <link rel="icon" href="img/tabicon.PNG">

    <style>
        <?php
        include 'css/main.css';
        include 'css/album.css';
        ?>
    </style>
</head>
<body>

<script>
    <?php include 'map.js';
//        include 'scripts.html';
    ?>
</script>

<?php include 'navbar.html'; ?>


<main role="main" class="bg-light">

        <div>
            <h1 class="page-title">Activity feed</h1>
        </div>

    <div class="album bg-light">
        <div class="container">
            <div class="row">

                <?php

                for ($i = 1; $i < 4; $i++) {

                    echo '<div class="col-md-6 col-lg-4">
                    <div class="card mb-4 box-shadow">
                        <div id="map' . $i .'" class="map"></div>
                        <div class="card-body">
                            <div class="card-text">';
                    echo 'Adam Belianský' . '</div>
                            <p class="text-muted">'
                        . '7.11.2020 21:39' .
                        '<p class="card-text">'
                        . 'Afternoon ride' . '</p>
                            <div class="stats">' . '

                                <div>
                                    <p>Distance<br />23.45 km</p>
                                </div>

                                <div>
                                    <p>Speed<br />12.1 km/h</p>
                                </div>

                                <div>
                                    <p>Time<br />1h 56m</p>
                                </div>

                            </div>
                            <div class="justify-content-between align-items-center">
                                <div class="btn-group-feed">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Comment</button>
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

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>

<script>
<?php
    include 'scripts.html';
?>
</script>
</body>
</html>
