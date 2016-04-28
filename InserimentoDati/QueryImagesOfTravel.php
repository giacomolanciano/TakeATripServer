<?php 

//mysqli_select_db(); 


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 



 
$codiceViaggio = $_POST["codice"]; 
 
$q = mysql_query("
SELECT 
    iv.urlImmagineViaggio, iv.ordineTappa, iv.livelloCondivisione
FROM
    takeatrip_db.Viaggio v,
    takeatrip_db.ImmagineViaggio iv
WHERE
    v.codice = '$codiceViaggio'
        AND v.codice = iv.codiceViaggio
        AND (iv.livelloCondivisione = 'Public' OR iv.livelloCondivisione = 'Travel')
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