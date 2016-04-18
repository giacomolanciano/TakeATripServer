<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$email = $_POST["email"];





$q = mysql_query("SELECT pp.codiceViaggio, v.nomeViaggio, iv.urlImmagineViaggio 
				FROM takeatrip_db.PartePer pp, takeatrip_db.Viaggio v, takeatrip_db.ImmagineViaggio iv
				WHERE  pp.emailProfilo = '$email' and iv.ordineTappa = '0' and iv.urlImmagineViaggio <> 'null' 
				and pp.codiceViaggio = v.codice and v.codice = iv.codiceViaggio and pp.emailProfilo = iv.emailProfilo
				order by timestamp desc");


				
				
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