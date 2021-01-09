
   function initMap(src) {

        // var index = 1;
        // var xhttp = new XMLHttpRequest();
        // // if (str == "") {
        // //     document.getElementById("txtHint").innerHTML = "";
        // //     return;
        // // }
        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         let text = "map" + index.toString();
        //         map = new google.maps.Map(document.getElementById(text), {disableDefaultUI: true});
        //         src = 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download';
        //         const ctaLayer = new google.maps.KmlLayer(src, {
        //             map: map,
        //         });
        //         index++;
        //     }
        // };
        // xhttp.open("GET", "index.php", true);
        // xhttp.send();

        // const home = {lat: 48.6, lng: 18.425};

        // let myOptions = {
        //      // zoom: 14,
        //      // center: home,
        //     disableDefaultUI: true,
        // };
        //
        for (i = 1; i <= 6; i++) {
            let text = "map" + i.toString();
            map = new google.maps.Map(document.getElementById(text), {disableDefaultUI: true});
            src = 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download';
            const ctaLayer = new google.maps.KmlLayer(src, {
                map: map,
            });
         }

    }






