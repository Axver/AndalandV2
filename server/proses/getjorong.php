<?php
    ini_set('memory_limit', '-1');   
    
	

	$sql = "SELECT ST_AsGeoJSON(ST_Transform(ST_SetSrid(geom,32747), 4326)) as geometry,jumlah_kk,jumlah_pen,kepala_jor,luas_ha,nama_joron,gid FROM jorong";
	$result = pg_query($sql);
	$hasil1 = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
	
	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
		'gid' => $isinya['gid'],
        'nama_joron' => $isinya['nama_joron'],
        'jumlah_kk' => $isinya['jumlah_kk'],
        'jumlah_pen' => $isinya['jumlah_pen'],
        'kepala_jor' => $isinya['kepala_jor'],
        'luas_ha' => $isinya['luas_ha'],
        
		
		)
	);
	array_push($hasil1['features'], $features);
    }
    $data_jorong= json_encode($hasil1);

	?>
