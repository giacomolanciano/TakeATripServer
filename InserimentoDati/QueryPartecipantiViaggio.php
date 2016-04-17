<?php 

//mysqli_select_db(); 


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


 
//$codiceViaggio = '3d388ba1-cf7c-414b-a1ea-232f5be58155'; 


/*
$codiceViaggio = 'c5d7f17f-4a16-4591-9c0c-ea0e0e445756';
 */


$codiceViaggio = $_POST["codiceViaggio"]; 





$q = mysql_query("SELECT * 
FROM takeatrip_db.PartePer pp, takeatrip_db.Profilo p, takeatrip_db.ImmagineProfilo ip, takeatrip_db.ImmagineCopertina ic
WHERE pp.codiceViaggio = '$codiceViaggio' and pp.emailProfilo = p.email and pp.codAccount = p.codAccount and p.email = ip.emailProfilo and p.email = ic.emailProfilo"); 




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