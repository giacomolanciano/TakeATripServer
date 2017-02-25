<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$emailProfilo = $_POST["email"];
$emailProprietarioTappa = $_POST["emailProprietarioTappa"];
$codViaggio = $_POST["codice"];
$ordineTappa = $_POST["ordineTappa"];

/*
$emailProfilo = $_GET["email"];
$codViaggio = $_GET["codice"];
$ordineTappa = $_GET["ordineTappa"];
*/


mysql_set_charset("UTF8");
$q = mysql_query("
SELECT distinct
    iv.nota, p.email, p.username, iv.ordineTappa, iv.livelloCondivisione 
FROM 
    takeatrip_db.Tappa t, takeatrip_db.NotaTappa iv , takeatrip_db.Profilo p
WHERE 
    t.codiceViaggio = '$codViaggio' 
    AND p.email = iv.emailProfilo
    AND iv.emailProfilo = '$emailProprietarioTappa'
    and t.codiceViaggio = iv.codiceViaggio 
    and iv.ordineTappa= '$ordineTappa'
        AND ((iv.livelloCondivisione = '3' AND iv.emailProfilo = '$emailProfilo')
            OR iv.livelloCondivisione = '0' 
            OR (iv.livelloCondivisione = '2' AND '$emailProfilo' in (SELECT emailProfilo FROM takeatrip_db.PartePer WHERE codiceViaggio=iv.codiceViaggio))
            OR (iv.livelloCondivisione = '1' AND (iv.emailProfilo = '$emailProfilo' OR '$emailProfilo' in 
            	(SELECT seguace FROM takeatrip_db.Following WHERE seguito=iv.emailProfilo))))
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