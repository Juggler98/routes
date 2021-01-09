function showStats(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("distance").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "stats.php?q=", true);
    xhttp.send();
}