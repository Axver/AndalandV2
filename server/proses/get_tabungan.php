<?php
    ini_set('memory_limit', '-1');  
    
   
    
	

	$sql = "SELECT data_rumah.gid,ST_AsGeoJSON(data_rumah.geom) as geometry,CONCAT(pemilik.tabungan,penghuni.tabungan) as tabungan	
    FROM public.pemilik 
    INNER JOIN penghuni ON pemilik.gid=penghuni.gid 
    INNER JOIN data_rumah ON pemilik.gid=data_rumah.gid;";
	$result = pg_query($sql);
	$hasil_tabungan = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
	
	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
		'gid' => $isinya['gid'],
        'tabungan' => $isinya['tabungan'],
        
		
		)
	);
	array_push($hasil_tabungan['features'], $features);
    }
    $data_tabungan= json_encode($hasil_tabungan);

	?>
