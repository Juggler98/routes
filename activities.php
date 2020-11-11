<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Activities</title>
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

<?php include 'navbar.html'; ?>






<div class="bg-light">

    <div class="containe">
        <h1 class="page-title">My Activities</h1>
    </div>

<table class="table table-striped">
    <thead>
    <tr>
<!--        <th scope="col">#</th>-->
        <th scope="col">Type</th>
        <th scope="col">Date</th>
        <th scope="col">Title</th>
        <th scope="col">Time</th>
        <th scope="col">Distance</th>
        <th scope="col">Elevation</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 100; $i >= 1; $i--) {
    echo '<tr>
        <td>Hike</td>
        <td>10.11.2020</td>
        <td><a href="activity.php">Krásny vrch</a></td>
        <td>1:39:00</td>
        <td>7.48 km</td>
        <td>275 m</td>
    </tr>'; }

    ?>
    </tbody>
</table>

</div>>

<script>
<?php
include 'scripts.html';
?>
</script>

</body>
</html>
