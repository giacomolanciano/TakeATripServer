<?php 

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


$email = $_POST["email"]; 
$id = $_POST["id"]; 
$url = $_POST["url"];


$sql = "UPDATE takeatrip_db. ImmagineProfilo SET idImmagineProfilo='$id', urlImmagineProfilo = '$url' WHERE emailProfilo = '$email'"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 

echo "OK";

 
mysql_close($conn); 


?>