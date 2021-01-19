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


<main class="bg-light">

    <div>
        <h1 class="page-title">Activity feed</h1>
    </div>

    <div class="album bg-light">
        <div class="container">
            <div class="row" id="activity">

                <?php

                for ($i = 1; $i <= 4; $i++) {

                    echo '<div class="col-md-6 col-lg-4">
                    <div class="card mb-4 box-shadow">
                        <div id="map' . $i . '" class="map"></div>
                        <div class="card-body">
                            <div class="card-text">';
                    echo 'Adam' . '</div>
                            <p class="text-muted">'
                        . '9.11.2020 21:29' .
                        '<p class="card-text">'
                        . 'Afternoon ride' . '</p>
                            <div class="stats">' . '

                                <div>
                                    <p>Distance<br />21.35 km</p>
                                </div>

                                <div>
                                    <p>Speed<br />12.7 km/h</p>
                                </div>

                                <div>
                                    <p>Time<br />2h 56m</p>
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
<!--</body>-->
<!--</html>-->
