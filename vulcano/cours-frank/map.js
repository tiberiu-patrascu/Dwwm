var map = new google.maps.Map(document.getElementById("map"), {
    center: {
        lat: -34.397,
        lng: 150.644
    },
    zoom: 8
});

var markers = [];

$.getJSON(
    "coordonnees.json",
    function (data) {
        for (const pos of data) {
            let positionGeo = {
                lat: pos.lat,
                lng: pos.lng
            };
            let marker = new google.maps.Marker({
                position: positionGeo,
                map: map,
                icon: {
                    url: "icons/" + pos.color + "-icon.png"
                }
            });
            markers.push(marker);
        }
        map.setCenter(data[0]);
    }
);
