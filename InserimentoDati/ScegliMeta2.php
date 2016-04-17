
<?php 
define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
} $q = mysql_query("SELECT codiceMeta, nome  FROM takeatrip_db.Meta WHERE "); if($q==null){
	echo("variabile nulla");
} while($e=mysql_fetch_assoc($q)){
        $output[]=$e;
}

print(json_encode($output));

mysql_close($conn);?>