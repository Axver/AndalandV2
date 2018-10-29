<?php
    ini_set('memory_limit', '-1');  
   
    
	

	$sql = "SELECT ST_AsGeoJSON(ST_Transform(ST_SetSrid(geom,32747), 4326)) as geometry,layer,gid FROM batas_polygon";
	$result = pg_query($sql);
	$hasil3 = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
	
	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
		'gid' => $isinya['gid'],
        'layer' => $isinya['layer'],
        
		
		)
	);
	array_push($hasil3['features'], $features);
    }
    $data_bangunan= json_encode($hasil3);

	?>
