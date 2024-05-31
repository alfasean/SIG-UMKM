// $(document).ready(function () {
//     var umkmId = getParameterByName('id');
    
//     $.ajax({
//         url: 'map.php?id=' + umkmId,
//         method: 'GET',
//         dataType: 'json',
//         success: function (data) {
//             var map = L.map('map').setView([data[0].lat, data[0].lng], 15);

//             L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//                 attribution: '© OpenStreetMap contributors'
//             }).addTo(map);

//             L.marker([data[0].lat, data[0].lng]).addTo(map)
//                 .bindPopup(data[0].name)
//                 .openPopup();

//             // Ambil lokasi pengguna dan gambar rute ke UMKM
//             if (navigator.geolocation) {
//                 navigator.geolocation.getCurrentPosition(function (position) {
//                     var userLat = position.coords.latitude;
//                     var userLng = position.coords.longitude;

//                     L.Routing.control({
//                         waypoints: [
//                             L.latLng(userLat, userLng),
//                             L.latLng(data[0].lat, data[0].lng)
//                         ],
//                         routeWhileDragging: true,
//                         show: true, 
//                         createMarker: function () { return null; },
//                         lineOptions: {
//                             styles: [{ color: '#FF0000', opacity: 0.7, weight: 5 }]
//                         },
//                         router: new L.Routing.osrmv1({
//                             language: 'id',
//                             profile: 'car',
//                         }),
//                         routeLine: function (route, options) {
//                             var line = L.Routing.line(route, options);
//                             return line;
//                         },
//                         collapsible: true,
//                         showAlternatives: false,
//                         altLineOptions: { styles: [{ color: '#FF0000', opacity: 0.15, weight: 9 }] },
//                         summaryTemplate: '<div class="route-info">{name}<br>{distance}, {time}</div>',
//                     }).addTo(map);
//                 }, function () {
//                     handleLocationError(true);
//                 });
//             } else {
//                 handleLocationError(false);
//             }
//         },
//         error: function (error) {
//             console.log('Error loading map data: ' + error);
//         }
//     });

//     function getParameterByName(name, url) {
//         if (!url) url = window.location.href;
//         name = name.replace(/[\[\]]/g, '\\$&');
//         var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
//             results = regex.exec(url);
//         if (!results) return null;
//         if (!results[2]) return '';
//         return decodeURIComponent(results[2].replace(/\+/g, ' '));
//     }
// });
