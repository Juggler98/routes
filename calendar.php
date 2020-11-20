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
        include 'css/album.css';
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

            $months = array("JAN", "FEB", "MAR", "APR", "MAJ", "JUN", "JUL", "AUG", "SEP", "OKT", "NOV", "DEC");

            for ($i = 0; $i < 12; $i++) {

                echo '<div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card mb-4 box-shadow">
                       
                        <div class="card-body">
                            <div class="card-text">' .
                    $months[$i] . '</div><br />
                            <div class="stats">' . '

                                <div>
                                    <p style="font-size: inherit">KILOMETERS<br />23</p>
                                </div>

                                <div>
                                    <p>HOURS<br />12</p>
                                </div>

                                <div>
                                    <p>ACTIVITIES<br />5</p>
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


<script>
    <?php
    include 'scripts.html';
    ?>
</script>

</body>
</html>

