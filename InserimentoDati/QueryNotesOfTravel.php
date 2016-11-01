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
$codiceViaggio = 'cdfa1bda-1615-4ab1-83b9-f7f9c666bd1a'; 
$emailProfilo = 'google108180077738116663863';
*/

 
$q = mysql_query("
SELECT 
    nt.nota, p.email, p.username, nt.ordineTappa, nt.livelloCondivisione
FROM
    takeatrip_db.Viaggio v,
    takeatrip_db.NotaTappa nt,
    takeatrip_db.Profilo p
WHERE
    v.codice = '$codiceViaggio'
        AND v.codice = nt.codViaggio
        AND nt.emailProfilo = p.email
        AND (nt.emailProfilo = '$emailProfilo'
            OR nt.livelloCondivisione = 'Public' 
            OR nt.livelloCondivisione = 'Travel')
ORDER BY nt.timestamp DESC");


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