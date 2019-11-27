// Dans cet exemple, nous centrons la carte et ajoutons un marqueur à l'aide d'un objet LatLng
// littéral au lieu d'un objet google.maps.LatLng. Les littéraux d'objet LatLng sont
// un moyen pratique pour ajouter une coordonnée LatLng et, dans la plupart des cas, peut être utilisé
// à la place d'un objet google.maps.LatLng.

var map;
var markersArrays = [];

function addMarkers(latLgn, color) {
    let url = "http://maps.google.com/mapfiles/ms/icons/";
    url += color + "-dot.png";

    let monMarker = new google.maps.Marker({
        map: map,
        position: latLgn,
        icon: {
            url: url
        },
        animation: google.maps.Animation.DROP,
    });
    markersArrays.push(monMarker);
};
// addMarkers({
//         lat: 48.0955586,
//         lng: 7.3768371
//     },"green");
// addMarkers({
//     lat: 47.5829962,
//     lng: 7.5665848
// }, "green");
// addMarkers({
//     lat: 47.956849,
//     lng: 7.3026445
// }, "green");
// addMarkers({
//     lat: 47.8085328,
//     lng: 7.3080093,
// }, "green");
// addMarkers({
//     lat: 48.0989226,
//     lng: 7.3687508,
// }, "green");
// addMarkers({
//     lat: 48.2468,
//     lng: 7.18528,
// }, "green");
// addMarkers({
//     lat: 47.7983567,
//     lng: 7.1632813,
// }, "green");
// addMarkers({
//     lat: 47.7447349,
//     lng: 7.343943,
// }, "green");
// addMarkers({
//     lat: 47.6323868,
//     lng: 7.4894291,
// }, "green");


// addMarkers({
//     lat: 47.6224617,
//     lng: 7.2465022,
// }, "blue");
// addMarkers({
//     lat: 48.0418986,
//     lng: 7.5572003,
// }, "blue");
// addMarkers({
//     lat: 47.6248845,
//     lng: 7.2283357,
// }, "blue");
// addMarkers({
//     lat: 47.6273494,
//     lng: 7.1142328,
// }, "blue");
// addMarkers({
//     lat: 47.7594815,
//     lng: 7.4003168,
// }, "blue");
// addMarkers({
//     lat: 47.8106195,
//     lng: 7.1094452,
// }, "blue");
// addMarkers({
//     lat: 48.0411946,
//     lng: 7.3129803,
// }, "blue");
// addMarkers({
//     lat: 48.1287768,
//     lng: 7.3514981,
// }, "blue");
// addMarkers({
//     lat: 48.2468,
//     lng: 7.18528,
// }, "blue");
// addMarkers({
//     lat: 47.7694149,
//     lng: 7.3775515,
// }, "blue");
// addMarkers({
//     lat: 47.9095289,
//     lng: 7.2560692,
// }, "blue");

function initialize() {
    var mapOptions = {
        zoom: 9,
        center: {
            lat: 47.934216,
            lng: 7.361044,
        }

    };
    map = new google.maps.Map(document.getElementById('carte'),
        mapOptions);

    var monMarker = new google.maps.Marker({
        // The below line is equivalent to writing:
        // position: new google.maps.LatLng(-34.397, 150.644)
        position: {
            lat: 47.7330884,
            lng: 7.3044454,
        },
        map: map,
        animation: google.maps.Animation.BOUNCE,
    });


    $.getJSON("map.json", function (jsonData) {

        $.each(jsonData, function (key, data) {
            let url = "http://maps.google.com/mapfiles/ms/icons/";
            url += data.color + "-dot.png";

            var latLng = new google.maps.LatLng(data.lat, data.lng);
            // Creating a marker and putting it on the map
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: {
                    url: url
                },
                animation: google.maps.Animation.DROP,
            });
        });
    });

    // Vous pouvez utiliser un littéral LatLng à la place d'un objet google.maps.LatLng lorsque
    // création de l'objet marqueur. Une fois que l’objet marqueur est instancié, son
    // position sera disponible en tant qu'objet google.maps.LatLng. Dans ce cas,
    // on récupère la position du marqueur en utilisant le
    // méthode google.maps.LatLng.getPosition ().
    var infowindow = new google.maps.InfoWindow({
        content: '<p style="color: #000;text-align: center;">Ma position:<br>' + monMarker.getPosition() + '</p>'
    });

    google.maps.event.addListener(monMarker, 'click', function () {
        infowindow.open(map, monMarker);
    });


}

google.maps.event.addDomListener(window, 'load', initialize);