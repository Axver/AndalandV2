<?php

include "../connect.php";

$provinsi=$_GET['provinsi'];

$sql = "SELECT ST_AsGeojson(ST_centroid(geom)) as geometry FROM indonesia_prop WHERE propinsi='$provinsi'";

$result = pg_query($sql);
while($a = pg_fetch_assoc($result)){
	//print_r($a['geometry']);
	$x = JSON_ENCODE($a['geometry']);
	// echo $x;
    echo substr($x,38,-3)."|";
}

$carikabupaten = "SELECT kabupaten_ FROM public.indonesia_kab WHERE UPPER(provinsi)='$provinsi'";

$i=0;
$result = pg_query($carikabupaten);
while($ai = pg_fetch_assoc($result)){
	//print_r($a['geometry']);
	$xi[$i] = $ai['kabupaten_'];
	// echo $x;
	echo $xi[$i]."|";
	$i++;
}


	// $hasil = array(
	// 'type'	=> 'FeatureCollection',
	// 'features' => array()
	// );

	// while ($isinya = pg_fetch_assoc($result)) {
	// 	$features = array(
	// 	'type' => 'Feature',
	// 	'geometry' => json_decode($isinya['geometry']),
	// 	'properties' => array(
	
	// 	)
	// );
	// array_push($hasil['features'], $features);
	// }
	// echo pg_fetch_assoc($result)['geometry'];

?>