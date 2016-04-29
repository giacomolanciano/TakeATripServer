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
    vv.urlVideo, vv.ordineTappa, vv.livelloCondivisione
FROM
    takeatrip_db.Viaggio v,
    takeatrip_db.VideoViaggio vv
WHERE
    v.codice = '$codiceViaggio'
        AND v.codice = vv.codiceViaggio
        AND (vv.emailProfilo = '$emailProfilo'
            OR vv.livelloCondivisione = 'Public' 
            OR vv.livelloCondivisione = 'Travel')
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