<?php 

//mysqli_select_db(); 


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


$username = $_POST["username"]; 

$q = mysql_query("SELECT distinct v.codice, v.nomeViaggio, v.idFotoViaggio, p.email, p.nome, p.cognome
FROM takeatrip_db.Profilo p, takeatrip_db.PartePer pp, takeatrip_db.Viaggio v, takeatrip_db.Filtro f
WHERE v.codice = f.codiceViaggio and pp.emailProfilo = p.email and p.username = '$username' and pp.codiceViaggio=v.codice");


/*
$q = mysql_query("SELECT distinct v.codice, v.nomeViaggio, p.email, p.nome, p.cognome, iv.urlImmagineViaggio 
FROM takeatrip_db.PartePer pp, takeatrip_db.Viaggio v, takeatrip_db.Profilo p, takeatrip_db.Itinerario i,  takeatrip_db.ImmagineViaggio iv
WHERE p.username = '$username'  and p.email = i.emailProfilo and i.codiceViaggio=v.codice and iv.emailProfilo = p.email and iv.codiceViaggio = v.codice and iv.ordineTappa = '0' "); 
*/



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