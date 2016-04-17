
<?php

//mysqli_select_db();

$codiceCitta = $_POST["codiceCitta"];
//$nomeCitta = $_POST["nomeCitta"];

define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}

$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Citta(codiceMeta) VALUES(?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "s", $codiceCitta);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);



mysqli_close($conn);
?>