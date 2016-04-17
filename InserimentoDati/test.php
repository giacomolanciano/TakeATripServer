<?php
	//Enter your code here, enjoy!

$array = array("1" => "PHP code tester Sandbox Online",  
			  "foo" => "bar", 5 , 5 => 89009, 
			  "case" => "Random Stuff: " . rand(100,999),
			  "PHP Version" => phpversion()
			  );
		  
foreach( $array as $key => $value ){
	echo $key."\t=>\t".$value."\n";
}

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null\n";
}

/*
$email = 'google118018255783762108439';
*/

$email = $_GET["email"];

echo $email;


$q = mysql_query("SELECT * FROM takeatrip_db.Profilo p WHERE  p.email= '$email';");


				
				
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