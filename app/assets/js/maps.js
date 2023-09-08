var map;
var infoWindow;

var markersData = [
    {
        lat: -26.996625,
        lng: -48.652454,
        nome: "Matriz - Av Marginal Leste, 3500, Estados, Balneário Camboriú/SC",
        telefone: "(47) 3261.1043",
        whatsapp: "(47) 9 9977.7858"
    },
    {
        lat: -26.9094939,
        lng: -48.6601357,
        nome: "Filial - Av Marcos Konder, 805, Sala 909, Centro, Itajaí/SC",
        telefone: "(47) 3514.1020",
        whatsapp: "(47) 9 9736.0927"
    }
];


function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(-29.987193, -51.118898),
        zoom: 8,
        mapTypeId: 'roadmap',
		scrollwheel: false
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    infoWindow = new google.maps.InfoWindow();

    google.maps.event.addListener(map, 'click', function () {
        infoWindow.close();
    });

    displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);

function displayMarkers() {

    var bounds = new google.maps.LatLngBounds();

    for (var i = 0; i < markersData.length; i++) {

        var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
        var nome = markersData[i].nome;
        var telefone = markersData[i].telefone;
        var whatsapp = markersData[i].whatsapp;

        createMarker(latlng, nome, telefone, whatsapp);

        bounds.extend(latlng);
    }

    map.fitBounds(bounds);
}

function createMarker(latlng, nome, telefone, whatsapp) {
    var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        title: nome
    });

    google.maps.event.addListener(marker, 'click', function () {

        var iwContent = '<div id="map_container">' +
            '<div class="tt"><i class="fa fa-building"></i> ' + nome + '</div>' +
            '<div class="tt"><i class="fa fa-phone"></i> ' + telefone + '</div>' +
                '<div class="tt"><i class="fa fa-whatsapp"></i> ' + whatsapp;

        infoWindow.setContent(iwContent);
        infoWindow.open(map, marker);
    });
}