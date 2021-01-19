<?php

session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    header("Location: /tracking/login.php");
    exit();
}

?>

<script>
    <?php //include 'js/map.js';
    include 'js/activity.js';
    ?>
</script>

<main class="bg-light">

    <div>
        <h1 class="page-title">Activity feed</h1>
    </div>
    <!--    <div id="map1" class="map"></div>-->
    <div class="album bg-light">
        <div class="container">
            <div class="row" id="activity">


            </div>
        </div>
    </div>

</main>

<script>
    <?php
    include 'js/map.js'
    ?>
</script>

<!--</body>-->
<!--</html>-->
