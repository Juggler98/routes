<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clubs</title>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwdnlxB4C-bOkL_HqDe8a52r-E1pb6LdI&callback=initMap"
        defer
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="./img/Snímka.PNG">

    <style>
        <?php
        include 'css/main.css';
        include 'css/album.css';
        ?>
    </style>
</head>
<body>



<?php include 'navbar.html'; ?>

<div class="bg-light odsadenie">

    <div>
        <h1 class="page-title">Clubs</h1>
    </div>

    <ul class="list-group list-width">
        <?php
        for ($i = 0; $i < 50; $i++) {
            echo '<li class="list-group-item">Žilina runners
                        <button type="button" class="btn btn-light btn-ath">Join</button></li>';

        }
        ?>
    </ul>

</div>

<script>
    <?php
    include 'scripts.html';
    ?>
</script>


</body>
</html>

