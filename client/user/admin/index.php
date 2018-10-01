<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

   <script src="../../../server/js/main.js"></script>
   
</head>
<body>
   
<?php
include "include.php";
include "../../../server/connect.php";
include "../../view/header.php";
include "../../view/sidebar.php";
include "../../view/content.php";
include "../../view/footer.php";
include "../../../server/proses/getdata_prov.php";

?>    


<script>
var provinsi = <?php echo json_encode($hasil) ?>;
console.log(provinsi);
// console.log(provinsi.features[0].properties.propinsi);
// console.log(provinsi.features.length);
var jumlah_prov=provinsi.features.length;

var i=0;
while(i<jumlah_prov)
{
  var x = document.getElementById("provinsi");
  var option = document.createElement("option");
  option.text = provinsi.features[i].properties.propinsi;
  option.value = provinsi.features[i].properties.propinsi;
  x.add(option);
  i++;
}
</script>


<script>

  // PHP Ajax
  $(document).ready(function(){
    $('#provinsi').on('change',function(){
        var provinsi = $(this).val();
        if(provinsi){
            $.ajax({
                type:'GET',
                url:'../../../server/proses/postkabupaten.php?provinsi='+provinsi,
                // data:'provinsi='+provinsi,
                success:function(html){
                    // alert(html);
                    
                    // hallo = html.split('],[');
                    // console.log(hallo[0].substr(0,hallo[0].length-2).split(','));
                    
                    // console.log(hallo.length);
                    // var i=0;
                    // var arr = []        ;
                    // while(i<hallo.length){
                    //     arr[i] = hallo[i].substr(0,hallo[i].length-2).split(',');
                    //     i++;
                    // }
                    // console.log(arr);
                    markerprov(html);
                   

                    // var polygon = L.polygon(arr).addTo(mymap);
                    $('#kabupaten').html(html);
                    $('#kabupaten').html('<option value="">- Pertama Pilih Provinsi -</option>'); 
                }
               
            }); 
        }else{
            $('#kabupaten').html('<option value="">- tidak ditemukan -</option>');   
        }
    });
    

});

  </script>

  <script>

  function lokasi()
  {
     // call locate every 3 seconds... forever
        // placeholders for the L.marker and L.circle representing user's current position and accuracy    
        var current_position, current_accuracy;

function onLocationFound(e) {
  // if position defined, then remove the existing position marker and accuracy circle from the map
  if (current_position) {
      mymap.removeLayer(current_position);
      mymap.removeLayer(current_accuracy);
  }

  var radius = e.accuracy / 2;

  current_position = L.marker(e.latlng).addTo(mymap)
    .bindPopup("You are within " + radius + " meters from this point").openPopup();

  current_accuracy = L.circle(e.latlng, radius).addTo(mymap);
}

function onLocationError(e) {
  alert(e.message);
}

mymap.on('locationfound', onLocationFound);
mymap.on('locationerror', onLocationError);

// wrap map.locate in a function    
function locate() {
  mymap.locate({setView: true, maxZoom: 16});
}

// call locate every 3 seconds... forever
locate();
  }
  
  </script>


</body>
</html>
