<?php
    ini_set('memory_limit', '-1');  
    // include "../connect.php";

	$sql = "SELECT * FROM penghuni";
	$result = pg_query($sql);
	$hasil_penghuni = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
	
	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'properties' => array(
		'gid' => $isinya['gid'],
		'no_kk' => $isinya['no_kk'],
		'nama_kk' => $isinya['nama_kk'],
		'jumlah_tangungan' => $isinya['jumlah_tanggungan'],
		'nama_datuk' => $isinya['nama_datuk'],
		'suku' => $isinya['suku'],
		'tanggal_lahir' => $isinya['tanggal_lahir'],
		'pendidikan' => $isinya['pendidikan'],
		'penghasilan' => $isinya['penghasilan'],
		'asuransi' => $isinya['asuransi'],
		'aset' => $isinya['aset'],
		'tabungan' => $isinya['tabungan'],
		'pekerjaan' => $isinya['pekerjaan'],
		)
	);
	array_push($hasil_penghuni['features'], $features);
    }
    $data_rumah= json_encode($hasil_penghuni);

	?>
