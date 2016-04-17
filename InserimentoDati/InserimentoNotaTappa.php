<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


/*
$ordine = 1122;
$codiceViaggio = '3d388ba1-cf7c-414b-a1ea-232f5be58155';
$codAccount = '0';
$emailProfilo = 'admin@takeatrip.com';
$data = ' ';
$paginaDiario = 'bla bla bla bla';
$codicePOI = '11';
$itTappaPrecedente = NULL;
$ordineTappaPrecedente = NULL;
$fontePOI = 'google';
$emailTappaPrecedente = NULL;
*/



$ordine = $_POST["ordine"];
$codiceViaggio = $_POST["codiceViaggio"];
$emailProfilo = $_POST["emailProfilo"];
$timestamp = $_POST["timestamp"];
$nota = $_POST["nota"];



$sql = "INSERT into takeatrip_db.NotaTappa VALUES('$emailProfilo', '$codiceViaggio', '$ordine', '$timestamp', '$nota')"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


/*
$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Tappa VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "ssisssssss", $emailProfilo, $codiceViaggio, $ordine, $data, $paginaDiario, $codicePOI, $fontePOI, $itTappaPrecedente, $ordineTappaPrecedente, $emailTappaPrecedente);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);
*/


echo "OK"; 

mysql_close($conn);
?>