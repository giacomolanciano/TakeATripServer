<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}




/*
$codice = ; 
$email = ;
$codAccount = ; 
*/



$codice = $_POST["codice"]; 
$email = $_POST["email"];
$codAccount = $_POST["codAccount"]; 
$idImmagine = 'null';
$ordineTappa = '0';
$urlImmagine = $email . "/" . $codice . "/imageTravel.jpg" ;
$condivisione = 'public';


$sql = "INSERT into takeatrip_db.PartePer VALUES('$email', '$codice', '$codAccount')";

$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 
	
	
$sql = "INSERT into takeatrip_db.Itinerario(codiceViaggio, emailProfilo, codAccount) VALUES('$codice', '$email', '$codAccount')";

$mysql_result=mysql_query($sql,$conn) or die(mysql_error());

$sql = "INSERT into takeatrip_db.ImmagineViaggio VALUES('$email', '$codice', '$ordineTappa', '$idImmagine', '$urlImmagine', '$condivisione')";

$mysql_result=mysql_query($sql,$conn) or die(mysql_error());  

mysql_close($conn);

/*
$email = $_POST["emailProfilo"];
$codice = $_POST["codice"];
$nomeViaggio = $_POST["nomeViaggio"];





$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Viaggio VALUES(?, ?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "ss",  $codice, $nomeViaggio);
mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);


$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.PartePer VALUES(?, ?)");
if($statement == null){
	echo "statement null";
}


mysqli_stmt_bind_param($statement, "ss",  $email, $codice);
mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);


$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Itinerario(codiceViaggio, emailProfilo) VALUES(?, ?)");
if($statement == null){
	echo "statement null";
}


mysqli_stmt_bind_param($statement, "ss",  $codice, $email);
mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);


mysqli_close($conn);


*/
?>