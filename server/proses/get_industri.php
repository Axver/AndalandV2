<?php
    ini_set('memory_limit', '-1');  
    // include '../connect.php';

	$sql = "SELECT ST_AsGeoJSON(geom) as geometry,data_rumah.gid,
    industri.jenis_industri,industri.kelas_industri,
    industri.nama_industri,industri.nama_pemilik,
    industri.penjualan_perbulan 
    FROM data_rumah 
    RIGHT JOIN industri on data_rumah.gid=industri.gid";
	$result = pg_query($sql);
	$hasil_industri = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
	
	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
        'gid' => $isinya['gid'],
        'jenis_industri' => $isinya['jenis_industri'],
        'kelas_industri' => $isinya['kelas_industri'],
        'nama_industri' => $isinya['nama_industri'],
        'nama_pemilik' => $isinya['nama_pemilik'],
        'penjualan_perbulan' => $isinya['penjualan_perbulan'],
		)
	);
	array_push($hasil_industri['features'], $features);
    }
    $data_industri= json_encode($hasil_industri);

	?>
