<?php 

//mysqli_select_db(); 



define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 

/*
$email = 'google108205700469353945427'; 
$path = 'google108205700469353945427/8b9fb6fd-1fe1-4b36-f49b-9b16ae5f39f7';
*/

$email = $_POST["email"]; 
$path = $_POST["path"]; 



$q = mysql_query("SELECT cv.codiceCartella, cv.urlCartella FROM takeatrip_db.CartellaViaggio cv, takeatrip_db.Profilo p WHERE 
cv.urlCartella = '$path' and p.email = '$email' and cv.emailProfilo = p.email"); 



if($q==null){ 
echo("variabile nulla"); 
} 

while($e=mysql_fetch_assoc($q)){ 
$output[]=$e; 
} 


if($output != null){ 
print(json_encode($output)); 
} 
else{ 
//stampa null 
print(json_encode($output)); 
} 




mysql_close($conn); 
?>