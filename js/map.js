

    function initMap(src) {

        // const home = {lat: 48.6, lng: 18.425};

        // let myOptions = {
        //      // zoom: 14,
        //      // center: home,
        //     disableDefaultUI: true,
        // };

        for (i = 1; i <= 6; i++) {
            let text = "map" + i.toString();
            map = new google.maps.Map(document.getElementById(text), {disableDefaultUI: true});
            src = 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download';
            const ctaLayer = new google.maps.KmlLayer(src, {
                map: map,
            });
        }

    }


