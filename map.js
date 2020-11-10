

    function initMap() {

        // const home = {lat: 48.6, lng: 18.425};

        // let myOptions = {
        //      // zoom: 14,
        //      // center: home,
        //     disableDefaultUI: true,
        // };

        for (i = 1; i <= 100; i++) {
            let text = "map" + i.toString();
            map = new google.maps.Map(document.getElementById(text), {disableDefaultUI: true});
            const ctaLayer = new google.maps.KmlLayer({
                url: 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download',
                map: map,
            });
        }

    }


