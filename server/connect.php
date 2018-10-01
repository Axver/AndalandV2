<?php

$username="postgres";
$password="toor";
$host="localhost";
$port="5432";
$database="andaland";

$koneksi=pg_connect("host=".$host." port=".$port." dbname=".$database." user=".$username." password=".$password);


?>