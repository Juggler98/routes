

    function initMap() {

        const home = {lat: 48.6, lng: 18.425};

        var myOptions = {
            // zoom: 14,
            // center: home,
            disableDefaultUI: true,
        };

        var myOptions1 = {
             // zoom: 10,
             // center: {lat: 48.6, lng: 18.425},
            disableDefaultUI: true,
        };
        var text;
        for (i = 1; i <= 10; i++) {
            var text = "map" + i.toString();
            map = new google.maps.Map(document.getElementById(text), myOptions);
            const ctaLayer = new google.maps.KmlLayer({
                url: 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download',
                map: map,
            });
        }

    }


