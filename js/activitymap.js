function initMap() {

    map = new google.maps.Map(document.getElementById("map"));
    const ctaLayer = new google.maps.KmlLayer({
        url: 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download',
        map: map,
    });

}