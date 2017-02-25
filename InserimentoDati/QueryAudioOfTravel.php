<?php 

//mysqli_select_db(); 


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 



 
$codiceViaggio = $_POST["codice"]; 
$emailProfilo = $_POST["email"]; 

/*
$codiceViaggio = $_GET["codice"]; 
$emailProfilo = $_GET["email"];
*/ 
 
$q = mysql_query("
SELECT 
    av.emailProfilo, av.urlAudio, av.ordineTappa, av.livelloCondivisione
FROM
    takeatrip_db.Viaggio v,
    takeatrip_db.AudioViaggio av
WHERE
    v.codice = '$codiceViaggio'
        AND v.codice = av.codiceViaggio
        AND ((av.livelloCondivisione = '3' AND av.emailProfilo = '$emailProfilo')
            OR av.livelloCondivisione = '0' 
            OR (av.livelloCondivisione = '2' AND '$emailProfilo' in (SELECT emailProfilo FROM takeatrip_db.PartePer WHERE codiceViaggio=av.codiceViaggio))
            OR (av.livelloCondivisione = '1' AND (av.emailProfilo = '$emailProfilo' OR '$emailProfilo' in 
            	(SELECT seguace FROM takeatrip_db.Following WHERE seguito=av.emailProfilo))))
ORDER BY timestamp DESC");




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
print(json_encode($output)); 
} 




mysql_close($conn); 
?>