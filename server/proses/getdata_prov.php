<?php
    ini_set('memory_limit', '-1');    
	

	$sql = "select gid, propinsi FROM indonesia_prop";
	$result = pg_query($sql);
	$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'properties' => array(
		'gid' => $isinya['gid'],
		'propinsi' => $isinya['propinsi'],
	
		)
	);
	array_push($hasil['features'], $features);
	}
	$data= json_encode($hasil);

	?>
