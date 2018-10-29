<?php
    ini_set('memory_limit', '-1');  
   
    
	

	$sql = "SELECT ST_AsGeoJSON(geom) as geometry,status_rumah,gid FROM data_rumah";
	$result = pg_query($sql);
	$hasil_all = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
	
	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
		'gid' => $isinya['gid'],
        'status' => $isinya['status_rumah'],
        
		
		)
	);
	array_push($hasil_all['features'], $features);
    }
    $data_all= json_encode($hasil_all);

	?>
