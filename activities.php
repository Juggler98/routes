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
    <?php include 'navbar.html'; ?>
</head>
<body>

<div class="bg-light">
    <div>
        <h1 class="page-title">My Activities</h1>
    </div>

<table class="table table-striped">
    <thead>
    <tr>
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
    $storage = new DBStorage();
    $activities = $storage->loadAllActivities();

    /** @var Activity $activity */
    foreach ($activities as $activity) {
    echo '<tr>
        <td>' . $activity->getType() . '</td>
        <td>' . "nieco" . '</td>
        <td><a href="activity.php">Krásny vrch</a></td>
        <td>' . $activity->getTime() . '</td>
        <td>' . $activity->getDistance() . '</td>
        <td>' . $activity->getElevation() . '</td>
    </tr>'; }

    ?>
    </tbody>
</table>

</div>

<script>
<?php
include 'scripts.html';
?>
</script>
</body>
</html>
