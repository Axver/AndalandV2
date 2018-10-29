<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin="" />
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
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
include "../../../server/proses/getjorong.php";
include "../../../server/proses/get_nagari.php";
include "../../../server/proses/get_polygon.php";
include "../../../server/proses/getrumah.php";
include "../../../server/proses/getpenghuni.php";
include "../../../server/proses/get_rkosong.php";
include "../../../server/proses/getpemilik.php";
include "../../../server/proses/get_industri.php";
include "../../../server/proses/get_line.php";
include "../../../server/proses/get_tabungan.php";
include "../../../server/proses/get_asuransi.php";




?>

  <script>
    var poli = [];
    var tanda = 0;

    function remove() {
      console.log(poli.length);

      poli[0].eachLayer(function (layer) {
        poli[0].removeLayer(layer);
      });

      poli[1].eachLayer(function (layer) {
        poli[1].removeLayer(layer);
      });

      poli[2].eachLayer(function (layer) {
        poli[2].removeLayer(layer);
      });
      tanda = 0;


    }

    function tampil_jorong() {
      if (tanda == 1) {
        remove();
      }
      var alljorong = <?php echo json_encode($hasil1)?>;
      // var jorong=L.geoJSON(alljorong).addTo(mymap);
      console.log(alljorong);


      // L.geoJSON(jsonjalan).addTo(mymap);

      for (var i = 0; i < alljorong.features.length; i++) {

        poli[i] = L.geoJSON(alljorong.features[i].geometry).addTo(mymap);
        poli[i].setStyle({
          fillColor: '#00FF00'
        });
        poli[i].setStyle({
          fillOpacity: 0.5
        });
        poli[i].setStyle({
          color: '#FF0000'
        });
        poli[i].bindPopup("<b>ID:</b> " + alljorong.features[i].properties.gid + "<br/><b>Nama Jorong:</b> " +
          alljorong.features[i].properties.nama_joron +
          "<br/><b>Jumlah_Bangunan:</b> " + alljorong.features[i].properties.jumlah_kk +
          "<br/><b>Jumlah Penduduk:</b> " + alljorong.features[i].properties.jumlah_pen +
          "<br/><b>Kepala Jorong:</b> " + alljorong.features[i].properties.kepala_jor +
          "<br/><b>Luas Wilayah:</b> " + alljorong.features[i].properties.luas_ha
        );
      }

      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);
      tanda = 1;






    }

    function tampil_nagari() {
      if (tanda == 1) {
        remove();
      }
      var allnagari = <?php echo json_encode($hasil_line)?>;
      var nagaripoly = <?php echo json_encode($hasil3)?>;
      L.geoJSON(nagaripoly).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.layer == "RUMAH") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);


          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00F'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        } else if (allnagari.features[i].properties.layer == "HUTAN") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00FF00'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        } else if (allnagari.features[i].properties.layer == "JALAN") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#000000'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        } else if (allnagari.features[i].properties.layer == "SUNGAI") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00FFF0'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        } else {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#FF0000'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        }

        tanda = 1;
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);
    }

    function tampil_bangunan() {

      var allnagari = <?php echo json_encode($hasil2)?>;
      var nagaripoly = <?php echo json_encode($hasil3)?>;
      // L.geoJSON(allnagari).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.layer == "RUMAH") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00F'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        }

        tanda = 1;
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);
    }

    function tampil_jalan() {

      var allnagari = <?php echo json_encode($hasil_line)?>;
      var nagaripoly = <?php echo json_encode($hasil3)?>;
      // L.geoJSON(allnagari).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.layer == "JALAN") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#000000'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        }

        tanda = 1;
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);
    }

    function tampil_sawah() {

      var allnagari = <?php echo json_encode($hasil2)?>;
      var nagaripoly = <?php echo json_encode($hasil3)?>;
      // L.geoJSON(allnagari).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.layer == "SAWAH") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#86af49'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        }

        tanda = 1;
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);
    }

    function tampil_hutan() {
      var allnagari = <?php echo json_encode($hasil2)?>;
      var nagaripoly = <?php echo json_encode($hasil3)?>;
      // L.geoJSON(allnagari).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.layer == "HUTAN") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: ''
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#86af49'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        }

        tanda = 1;
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);
    }

    function tampil_sungai() {

      var allnagari = <?php echo json_encode($hasil_line)?>;
      var nagaripoly = <?php echo json_encode($hasil3)?>;
      // L.geoJSON(allnagari).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.layer == "SUNGAI") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#80ced6'
          });
          poli[i].bindPopup("<b>Layer:</b> " + allnagari.features[i].properties.layer);
        }

        tanda = 1;
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);
    }

    function tampil_rumah_kg() {
      // alert("Test");
      var argeojson = <?php echo json_encode($hasil_rumah) ?>;
      var geojsonpenghuni = <?php echo json_encode($hasil_penghuni) ?>;



      // var jalan= L.geoJSON(jsonjalan).addTo(mymap);
      // console.log(jsonjalan.features.length);

      var poli;
      // L.geoJSON(jsonjalan).addTo(mymap);

      for (var i = 0; i < argeojson.features.length; i++) {
        if (argeojson.features[i].properties.status == 'Berisi') {
          // console.log(argeojson.features[i].geometry);
          poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
          poli.setStyle({
            fillColor: '#00FF00'
          });
          poli.setStyle({
            fillOpacity: 0.5
          });
          poli.setStyle({
            color: 'none'
          });
          // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/> <img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
          poli.bindPopup("<b>ID:</b> KG" + argeojson.features[i].properties.gid + "<br/>" + argeojson.features[i].properties
            .status + "<br/><button onclick='inforumah(" + argeojson.features[i].properties.gid + ")'>" +
            "View Detil</button>" +
            "<table><tbody><th>Pemilik</th><th>Penghuni</th><tr><td>" +
            "<br/><br/><b>Nama Pemilik:</b> " + argeojson.features[i].properties.nama_pemilik +
            "<br/><b>Nama Datuk:</b> " + argeojson.features[i].properties.nama_datuk +
            "<br/><b>Suku Pemilik:</b> " + argeojson.features[i].properties.suku_pemilik +
            "<br/><b>Taggal Lahir:</b> " + argeojson.features[i].properties.tgl_lahir +
            "<br/><b>Pendidikan:</b> " + argeojson.features[i].properties.pendidikan +
            "<br/><b>Pekerjaan:</b> " + argeojson.features[i].properties.pekerjaan +
            "<br/><b>Penghasilan:</b> " + argeojson.features[i].properties.penghasilan +
            "<br/><b>Asuransi:</b> " + argeojson.features[i].properties.asuransi +
            "<br/><b>Aset:</b> " + argeojson.features[i].properties.aset +
            "<br/><b>Tabungan:</b> " + argeojson.features[i].properties.tabungan +
            "<br/><b>Nama Kampung:</b> " + argeojson.features[i].properties.nama_kampung +
            "</td><td>" +
            "<br/><br/><b>No KK:</b> " + geojsonpenghuni.features[i].properties.no_kk +
            "<br/><b>Nama KK:</b> " + geojsonpenghuni.features[i].properties.nama_kk +
            "<br/><b>Jumlah Tanggungan:</b> " + geojsonpenghuni.features[i].properties.jumlah_tanggungan +
            "<br/><b>Nama Datuk:</b> " + geojsonpenghuni.features[i].properties.nama_datuk +
            "<br/><b>Suku:</b> " + geojsonpenghuni.features[i].properties.suku +
            "<br/><b>Tanggal Lahir:</b> " + geojsonpenghuni.features[i].properties.tanggal_lahir +
            "<br/><b>Pendidikan:</b> " + geojsonpenghuni.features[i].properties.pendidikan +
            "<br/><b>Penghasilan:</b> " + geojsonpenghuni.features[i].properties.penghasilan +
            "<br/><b>Asuransi:</b> " + geojsonpenghuni.features[i].properties.asuransi +
            "<br/><b>Aset:</b> " + geojsonpenghuni.features[i].properties.aset +
            "<br/><b>Tabungan:</b> " + geojsonpenghuni.features[i].properties.tabungan +
            "<br/><b>Pekerjaan:</b> " + geojsonpenghuni.features[i].properties.pekerjaan +
            "</td></tr></tbody></table>"

          );

        }

      }

      console.log(argeojson);
      mymap.setView(new L.LatLng(-0.318075, 100.357540), 16);


    }


    function tampil_rumah_kosong_kg() {
      var argeojson = <?php echo json_encode($hasil_all) ?>;



      // var jalan= L.geoJSON(jsonjalan).addTo(mymap);
      // console.log(jsonjalan.features.length);

      var poli;
      // L.geoJSON(jsonjalan).addTo(mymap);

      for (var i = 0; i < argeojson.features.length; i++) {
        if (argeojson.features[i].properties.status == 'Kosong') {
          // console.log(argeojson.features[i].geometry);
          poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
          poli.setStyle({
            fillColor: '#696969'
          });
          poli.setStyle({
            fillOpacity: 0.5
          });
          poli.setStyle({
            color: 'none'
          });
          // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/> <img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
          poli.bindPopup("<b>ID:</b> KG" + argeojson.features[i].properties.gid + "<br/>" + argeojson.features[i].properties
            .status + "<br/><button onclick='inforumah(" + argeojson.features[i].properties.gid + ")'>" +
            "View Detil</button>");

        }

      }

      console.log(argeojson);
      mymap.setView(new L.LatLng(-0.318075, 100.357540), 16);

    }

    function tampil_allrumah() {
      // alert("Test");
      var argeojson = <?php echo json_encode($hasil_all) ?>;
      var geojsonpenghuni = <?php echo json_encode($hasil_penghuni) ?>;
      var geojsonpemilik = <?php echo json_encode($hasil_pemilik) ?>;



      // var jalan= L.geoJSON(jsonjalan).addTo(mymap);
      // console.log(jsonjalan.features.length);

      var poli;
      // L.geoJSON(jsonjalan).addTo(mymap);

      for (var i = 0; i < argeojson.features.length; i++) {
        if (argeojson.features[i].properties.status == 'Berisi') {
          // console.log(argeojson.features[i].geometry);
          poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
          poli.setStyle({
            fillColor: '#00FF00'
          });
          poli.setStyle({
            fillOpacity: 0.5
          });
          poli.setStyle({
            color: 'none'
          });
          // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/> <img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");


        } else if (argeojson.features[i].properties.status == 'Kosong') {

          poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
          poli.setStyle({
            fillColor: '	#696969'
          });
          poli.setStyle({
            fillOpacity: 0.5
          });
          poli.setStyle({
            color: 'none'
          });
          poli.bindPopup("<b>ID:</b> KG" + argeojson.features[i].properties.gid + "<br/>" + argeojson.features[i].properties
            .status + "<br/><button onclick='inforumah(" + argeojson.features[i].properties.gid + ")'>" +
            "View Detil</button>");
          //   // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/><img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
        } else {
          poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
          poli.setStyle({
            fillColor: '#FFD700'
          });
          poli.setStyle({
            fillOpacity: 0.5
          });
          poli.setStyle({
            color: 'none'
          });
          poli.bindPopup("<b>ID:</b> KG" + argeojson.features[i].properties.gid + "<br/>" + argeojson.features[i].properties
            .status + "<br/><button onclick='inforumah(" + argeojson.features[i].properties.gid + ")'>" +
            "View Detil</button>");
          // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan <br/> <img src='../image/example.jpg'> <br/>-harga (Rp.xxxxxxxx)<br/> <p>Keterangan, keterangan,keterangan </p><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
        }

      }

      console.log(argeojson);
      mymap.setView(new L.LatLng(-0.318075, 100.357540), 16);

    }


    function tampil_industri() {

      var argeojson = <?php echo json_encode($hasil_industri) ?>;


      var poli;


      for (var i = 0; i < argeojson.features.length; i++) {
        // console.log(argeojson.features[i].geometry);
        poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
        poli.setStyle({
          fillColor: '#00FF00'
        });
        poli.setStyle({
          fillOpacity: 0.5
        });
        poli.setStyle({
          color: 'none'
        });
        poli.bindPopup("<b>ID:</b> KG" + argeojson.features[i].properties.gid + "<br/><button onclick='inforumah(" +
          argeojson.features[i].properties.gid + ")'>" + "View Detil</button>" +
          "<br/>" + argeojson.features[i].properties.jenis_industri +
          "<br/>" + argeojson.features[i].properties.kelas_industri +
          "<br/>" + argeojson.features[i].properties.nama_industri +
          "<br/>" + argeojson.features[i].properties.nama_pemilik +
          "<br/>" + argeojson.features[i].properties.penjualan_perbulan
        );
      }

      console.log(argeojson);
      mymap.setView(new L.LatLng(-0.318075, 100.357540), 16);
    }

    function tabungan() {

      //  alert("Test");
      var allnagari = <?php echo json_encode($hasil_tabungan)?>;
      var allnagari_line = <?php echo json_encode($hasil_line)?>;

      // L.geoJSON(nagaripoly).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.tabungan == "Ada") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);


          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00F'
          });
          poli[i].bindPopup("<b>Tabungan:</b> " + allnagari.features[i].properties.tabungan);
        } else if (allnagari.features[i].properties.tabungan == "Tidak Ada") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00FF00'
          });
          poli[i].bindPopup("<b>Tabungan:</b> " + allnagari.features[i].properties.tabungan);
        } else {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#000000'
          });
          poli[i].bindPopup("<b>Tabungan:</b> " + allnagari.features[i].properties.tabungan);
        }
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);

    }



    function asuransi() {

      //  alert("Test");
      var allnagari = <?php echo json_encode($hasil_asuransi)?>;
      //  var allnagari_line = <?php echo json_encode($hasil_line)?>;

      // L.geoJSON(nagaripoly).addTo(mymap);

      for (var i = 0; i < allnagari.features.length; i++) {

        if (allnagari.features[i].properties.asuransi == "Ada") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);


          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00F'
          });
          poli[i].bindPopup("<b>Asuransi:</b> " + allnagari.features[i].properties.asuransi);
        } else if (allnagari.features[i].properties.asuransi == "Tidak Ada") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00FF00'
          });
          poli[i].bindPopup("<b>Asuransi:</b> " + allnagari.features[i].properties.asuransi);
        } else if (allnagari.features[i].properties.asuransi == "ada(kshtn)") {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#00FF00'
          });
          poli[i].bindPopup("<b>Asuransi:</b> " + allnagari.features[i].properties.asuransi);
        } else {
          poli[i] = L.geoJSON(allnagari.features[i].geometry).addTo(mymap);
          poli[i].setStyle({
            fillColor: '#00FF00'
          });
          poli[i].setStyle({
            fillOpacity: 0.5
          });
          poli[i].setStyle({
            color: '#000000'
          });
          poli[i].bindPopup("<b>Asuransi:</b> " + allnagari.features[i].properties.asuransi);
        }
      }


      mymap.setView(new L.LatLng(-0.320049, 100.345609), 14);

    }
  </script>


  <script>
    var provinsi = <?php echo json_encode($hasil) ?>;
    console.log(provinsi);
    // console.log(provinsi.features[0].properties.propinsi);
    // console.log(provinsi.features.length);
    var jumlah_prov = provinsi.features.length;

    var i = 0;
    while (i < jumlah_prov) {
      var x = document.getElementById("provinsi");
      var option = document.createElement("option");
      option.text = provinsi.features[i].properties.propinsi;
      option.value = provinsi.features[i].properties.propinsi;
      x.add(option);
      i++;
    }
  </script>



  <script>
    // PHP Ajax Show Kabupaten
    $(document).ready(function () {
      $('#provinsi').on('change', function () {
        var provinsi = $(this).val();
        if (provinsi) {
          $.ajax({
            type: 'GET',
            url: '../../../server/proses/postkabupaten.php?provinsi=' + provinsi,
            success: function (html) {
              alert(html);
              data = html.split('|');
              markerprov(data[0]);
              jumlah_kab = data.length;
              alert(jumlah_kab);
              // $('#kabupaten').html('<option value="'+data+'">'+data+'</option>'); 
              var hapus = document.getElementById("kabupaten");
              $('#kabupaten').children().remove().end();

              i = 1;
              while (i <= jumlah_kab - 2) {

                // alert(i);
                var x1 = document.getElementById("kabupaten");
                var option1 = document.createElement("option");
                option1.text = data[i];
                option1.value = data[i];
                x1.add(option1);
                i++;
              }
            }

          });
        } else {
          // $('#kabupaten').html('<option value="">- tidak ditemukan -</option>');   
        }
      });
    });


    // PHP Ajax Show Kecamatan
    $(document).ready(function () {
      $('#kabupaten').on('change', function () {
        var kabupaten = $(this).val();
        if (kabupaten) {
          $.ajax({
            type: 'GET',
            url: '../../../server/proses/postkecamatan.php?provinsi=' + provinsi,
            success: function (html1) {
              alert(html1);
              data1 = html1.split('|');
              // markerprov(data1[0]);
              jumlah_kab1 = data1.length;
              alert(jumlah_kab1);
              // $('#kabupaten').html('<option value="'+data+'">'+data+'</option>'); 
              var hapus1 = document.getElementById("kecamatan");
              $('#kecamatan').children().remove().end();


              i = 1;
              while (i <= jumlah_kab1 - 2) {

                // alert(i);
                var x11 = document.getElementById("kecamatan");
                var option11 = document.createElement("option");
                option11.text = data1[i];
                option11.value = data1[i];
                x11.add(option11);
                i++;
              }
              // $('#kecamatan').html('<option value="">'+'Please Ijan Error'+'</option>');    
            }
          });
        } else {
          // $('#kabupaten').html('<option value="">- tidak ditemukan -</option>');   
        }
      });


    });
  </script>

  <script>
    function lokasi() {
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
        mymap.locate({
          setView: true,
          maxZoom: 16
        });
      }

      // call locate every 3 seconds... forever
      locate();
    }
  </script>


</body>

</html>