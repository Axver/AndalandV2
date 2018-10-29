
<!-- Script JS Menu-->


<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Andaland</a>
    </li>
    <li class="breadcrumb-item active">Admin</li>
  </ol>

  <div class="menu">
    
    <div class="panel panel-info">
       <div class="panel-head"></div>
       <div class="panel-body">

       <div class="row">
           <div class="col-sm-5">
           <button class="btn btn-info" onclick="lokasi()">Lokasi</button>
           <button class="btn btn-info">Menu 1</button>
           <button class="btn btn-info">Menu 1</button>
           <button class="btn btn-info">Menu 1</button>
           <button class="btn btn-warning">Menu 1</button>

           </div>

            <div class="col-sm-7">
            <div class="row">
              
              <div class="col-sm-4">
                  
                  <div class="form-group">
                  
                  <select onchange="provclick()" id="provinsi" class="form-control" id="sel1">
                 
                  </select>
                  </div>
              </div>
              <div class="col-sm-4">
                  
                  <div class="form-group">
                  
                  <select name="kabupaten" id="kabupaten" class="form-control" id="sel1">
                 
                  </select>
                  </div>
              </div>
              <div class="col-sm-4">
                  
                  <div class="form-group">
                  
                  <select name="kecamatan" id="kecamatan" class="form-control" id="sel1">
                
                  </select>
                  </div>
              </div>
       </div>

            </div>

       </div>
       <div class="col-sm-7">
           
       </div>
           
       </div>

      
    </div>

  </div>

  <div class="row">
    
    <div class="col-sm-8">
    <div id="mapid" style="height:500px; width:1090px;"></div>
    </div>


    </div>

  </div>


  
    
    
  <script>
  
   var mymap = L.map('mapid',{drawControl: true}).setView([-0.874904, 100.367544], 13);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYXh2ZXI3IiwiYSI6ImNqOXNxdHF4bjBzb2czM2p6cmVzZzBwcXgifQ.l38Ez-rF1XCin25iUIynoQ'
}).addTo(mymap);

// var drawnItems = new L.FeatureGroup();
//      mymap.addLayer(drawnItems);
//      var drawControl = new L.Control.Draw({
//          edit: {
//              featureGroup: drawnItems
//          }
//      });
//      mymap.addControl(drawControl);
function markerprov(html)
{
  
  test=html.split(',');
  console.log(test[0]);
  console.log(test[1]);
  var marker = L.marker([test[1],test[0]]).addTo(mymap);
  // alert("Masooook Pak Ekoo!!");
  // mymap.panTo(new L.LatLng(test[1], test[0]));

  mymap.setView(new L.LatLng(test[1], test[0]), 12);
}

  </script>

  

  

 
</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Your Website 2018</span>
    </div>
  </div>
</footer>

</div>
<!-- /.content-wrapper -->

</div>