<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


/*
$ordine = $_POST["ordine"];
$codiceViaggio = $_POST["codiceViaggio"];
$emailProfilo = $_POST["emailProfilo"];
$timestamp = $_POST["timestamp"];
$nota = $_POST["nota"];
$livelloCondivisione = $_POST["livelloCondivisione"]
*/

$ordine = $_GET["ordine"];
$codiceViaggio = $_GET["codiceViaggio"];
$emailProfilo = $_GET["emailProfilo"];
$timestamp = $_GET["timestamp"];
$nota = $_GET["nota"];
$livelloCondivisione = $_GET["livelloCondivisione"]


$sql = "INSERT into takeatrip_db.NotaTappa VALUES('$emailProfilo', '$codiceViaggio', '$ordine', '$timestamp', '$nota', '$livelloCondivisione')"; 
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