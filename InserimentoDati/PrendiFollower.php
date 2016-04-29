<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null\n";
}


$email = $_POST["email"];


$q = mysql_query("SELECT * FROM takeatrip_db.Following f , takeatrip_db.Profilo p , takeatrip_db.ImmagineCopertina ic, takeatrip_db.ImmagineProfilo ip WHERE  f.seguito= '$email' and f.seguace = p.email and ic.emailProfilo = p.email and ip.emailProfilo = p.email ; ");


				
				
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