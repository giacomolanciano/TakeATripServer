<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$emailProfilo = $_POST["email"];
$codViaggio = $_POST["codice"];
$ordineTappa = $_POST["ordineTappa"];

/*
$emailProfilo = $_GET["email"];
$codViaggio = $_GET["codice"];
$ordineTappa = $_GET["ordineTappa"];
*/





$q = mysql_query("
SELECT 
    iv.emailProfilo, iv.urlImmagineViaggio, iv.ordineTappa, iv.livelloCondivisione 
FROM 
    takeatrip_db.Viaggio v, takeatrip_db.ImmagineViaggio iv 
WHERE 
    v.codice = '$codViaggio' 
    AND iv.ordineTappa= '$ordineTappa'
    AND v.codice = iv.codiceViaggio
        AND ((iv.livelloCondivisione = 'Private' AND iv.emailProfilo = '$emailProfilo')
            OR iv.livelloCondivisione = 'Public' 
            OR (iv.livelloCondivisione = 'Travel' AND '$emailProfilo' in (SELECT emailProfilo FROM takeatrip_db.PartePer WHERE codiceViaggio=iv.codiceViaggio))
            OR (iv.livelloCondivisione = 'Followers' AND '$emailProfilo' in (SELECT seguace FROM takeatrip_db.Following WHERE seguito=iv.emailProfilo)))
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