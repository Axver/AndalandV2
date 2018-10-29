<?php
    ini_set('memory_limit', '-1');  
    // include "../connect.php";

	$sql = "SELECT ST_AsGeoJSON(data_rumah.geom) as geometry,pemilik.nama,pemilik.nama_datuk,pemilik.suku,
	pemilik.tgl_lahir,pemilik.pendidikan,pemilik.pekerjaan,pemilik.penghasilan,
	pemilik.asuransi,pemilik.aset,pemilik.tabungan,pemilik.nama_kampung,
	status_rumah,data_rumah.gid,penghuni.no_kk,penghuni.nama_kk,penghuni.jumlah_tanggungan,
	penghuni.nama_datuk,penghuni.suku,penghuni.tanggal_lahir,
	penghuni.pendidikan,penghuni.penghasilan,penghuni.asuransi,penghuni.aset,penghuni.tabungan,
	penghuni.pekerjaan FROM data_rumah INNER JOIN pemilik
	on data_rumah.gid=pemilik.gid INNER JOIN penghuni ON data_rumah.gid=penghuni.gid";
	$result = pg_query($sql);
	$hasil_rumah = array(
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
		'nama_pemilik' => $isinya['nama'],
		'nama_datuk' => $isinya['nama_datuk'],
		'suku_pemilik' => $isinya['suku'],
		'tgl_lahir' => $isinya['tgl_lahir'],
		'pendidikan' => $isinya['pendidikan'],
		'pekerjaan' => $isinya['pekerjaan'],
		'penghasilan' => $isinya['penghasilan'],
		'asuransi' => $isinya['asuransi'],
		'aset' => $isinya['aset'],
		'tabungan' => $isinya['tabungan'],
		'nama_kampung' => $isinya['nama_kampung'],
		)
	);
	array_push($hasil_rumah['features'], $features);
    }
    $data_rumah= json_encode($hasil_rumah);

	?>
