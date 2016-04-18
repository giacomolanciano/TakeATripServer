<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}



$ordine = $_POST["ordine"];
$codiceViaggio = $_POST["codiceViaggio"];
$emailProfilo = $_POST["emailProfilo"];
$data = $_POST["data"];
$paginaDiario = $_POST["paginaDiario"];
$codicePOI = $_POST["POI"];
$itTappaPrecedente = NULL;
$ordineTappaPrecedente = NULL;
$emailTappaPrecedente = NULL;
$codAccount = '0';
$fontePOI = 'google';


$sql = "INSERT into takeatrip_db.Tappa VALUES('$emailProfilo', '$codiceViaggio', '$ordine', '$codAccount', '$data', ' $paginaDiario','$codicePOI','$codicePOI','$itTappaPrecedente','$ordineTappaPrecedente', '$emailTappaPrecedente')"; 
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



$sql = "INSERT into takeatrip_db.POI VALUES('$codicePOI', '$fontePOI')"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


/*
$statement = mysql_prepare($conn, "INSERT into takeatrip_db.POI VALUES(?, ?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "ss", $codicePOI, $fontePOI);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);

*/

echo "OK"; 

mysql_close($conn);
?>