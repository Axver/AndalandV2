<?php

include "../connect.php";

$provinsi=$_GET['provinsi'];

$carikabupaten = "SELECT  kecamatan,kode_kab FROM public.indonesia_kec";

$i=0;
$result = pg_query($carikabupaten);
while($ai = pg_fetch_assoc($result)){
	//print_r($a['geometry']);
	$xi[$i] = $ai['kecamatan'];
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