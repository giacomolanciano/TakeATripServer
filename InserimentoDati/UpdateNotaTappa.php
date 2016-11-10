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
$vecchiaNota = $_POST["vecchiaNota"];
$nota = $_POST["nuovaNota"];




$sql = "UPDATE takeatrip_db.NotaTappa SET NotaTappa.nota='$nota' WHERE NotaTappa.emailProfilo='$emailProfilo'
 and NotaTappa.codViaggio='$codiceViaggio'and NotaTappa.ordineTappa ='$ordine' and NotaTappa.nota='$vecchiaNota';"; 

mysql_set_charset($conn, "UTF8");
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 

echo "OK"; 

mysql_close($conn);
?>