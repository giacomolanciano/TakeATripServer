<?php

//mysqli_select_db();


$codice = $_POST["codice"];
$temp = $_POST["temp"];
$pressione = $_POST["pressione"];
$umidita = $_POST["umidita"];
$tempMin = $_POST["tempMin"];
$tempMax = $_POST["tempMax"];
$vento = $_POST["vento"];

define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}

$statement = mysqli_prepare($conn, "UPDATE takeatrip_db.Meta SET temperatura=?, pressione=?,umidita=?, tempMin=?, tempMax=?, velocitaVento=? WHERE codiceMeta = '$codice' ");


if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "ssssss", $temp, $pressione, $umidita, $tempMin, $tempMax, $vento);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);



mysqli_close($conn);
?>