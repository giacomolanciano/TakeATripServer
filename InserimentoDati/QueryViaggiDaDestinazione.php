<?php 

//mysqli_select_db(); 


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


$destinazione = $_POST["destinazione"]; 

//$destinazione = 'grecia'; 

$q = mysql_query("SELECT distinct v.codice, v.nomeViaggio, v.idFotoViaggio, v.livelloCondivisione, p.email, p.nome, p.cognome
FROM takeatrip_db.Profilo p, takeatrip_db.PartePer pp, takeatrip_db.Viaggio v, takeatrip_db.Filtro f
WHERE v.codice = f.codiceViaggio and pp.emailProfilo = p.email and f.stringa = '$destinazione' and pp.codiceViaggio=v.codice");


/*$q = mysql_query("SELECT distinct v.codice, v.nomeViaggio, p.email, p.nome, p.cognome, v.idFotoViaggio
FROM takeatrip_db.Profilo p, takeatrip_db.PartePer pp,  takeatrip_db.Viaggio v, takeatrip_db.Filtro f 
WHERE pp.codiceViaggio=v.codice and pp.emailProfilo = p.email and iv.codiceViaggio = v.codice and iv.emailProfilo = p.email and v.codice = f.codiceViaggio and
f.stringa='$destinazione'
order by v.timestamp desc");*/


 

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