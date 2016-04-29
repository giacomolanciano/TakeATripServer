<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null\n";
}

//$ricerca = 'da';
$ricerca = $_POST["ricerca"];


$q = mysql_query("SELECT * FROM takeatrip_db.ImmagineProfilo ip, takeatrip_db.Profilo p2, takeatrip_db.ImmagineCopertina ic WHERE ip.emailProfilo=p2.email and ic.emailProfilo= p2.email and ip.emailProfilo in 
(SELECT DISTINCT p.email FROM takeatrip_db.Profilo p WHERE p.nomeCognomeUsername LIKE '%$ricerca%')");
//$q = mysql_query("SELECT * FROM takeatrip_db.Profilo WHERE nome LIKE '%$ricerca%' OR cognome LIKE '%$ricerca%' OR username LIKE '%$ricerca%' ");


				
				
if($q==null){
	echo("variabile nulla\n");
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