<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$q = mysql_query("SELECT distinct p.nome, p.cognome, p.email, p.username, p.sesso, ip.urlImmagineProfilo, ic.urlImmagineCopertina FROM takeatrip_db.Profilo p, takeatrip_db.ImmagineProfilo ip, takeatrip_db.ImmagineCopertina ic WHERE p.email = ip.emailProfilo and p.email = ic.emailProfilo and ip.emailProfilo = ic.emailProfilo ");

/*
$q = mysql_query("SELECT p.nome, p.cognome, p.email, p.username FROM takeatrip_db.Profilo p ");
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
//stampa null
	print(json_encode($output));
}




mysql_close($conn);
?>