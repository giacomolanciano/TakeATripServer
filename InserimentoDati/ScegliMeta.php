<?php






$email = $_POST["email"];
$nome = $_POST["nome"];
$altitudine = $_POST["altitudine"];
$temperatura = $_POST["temperatura"];
$pressione = $_POST["pressione"];
$umidita = $_POST["umidita"];
$tempMin = $_POST["tempMin"];
$tempMax = $_POST["tempMax"];
$vento = $_POST["velocitaVento"];
$etaMedia = $_POST["etaMedia"];


$posizione = strpos($email, ".");
$email = substr($email, 0, $posizione);
//$email = str_ireplace('@', '', $email);





$textFile = "ScegliMeta2" . $email . '.php';


$fileHandle = fopen($textFile, 'w') or die("can't open file");



$stringData = "
<?php 

define(\'__ROOT__\', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.\'/takeatrip_db_config.php\');

\$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if(\$conn == null){
	echo \"connessione null\";
}";





if($altitudine != null){
	$stringData = $stringData . ' $altitudine = $_POST["altitudine"];';
}

if($temperatura != null){
	$stringData = $stringData . ' $temperatura = $_POST["temperatura"];';
}

if($pressione != null){
	$stringData = $stringData . ' $pressione = $_POST["pressione"];';
}


if($umidita != null){
	$stringData = $stringData . '  $umidita = $_POST["umidita"];';
}

if($tempMin != null){
	$stringData = $stringData . ' $tempMin = $_POST["tempMin"];';
}

if($tempMax != null){
	$stringData = $stringData . ' $tempMax = $_POST["tempMax"];';
}

if($vento != null){
	$stringData = $stringData . ' $vento = $_POST["velocitaVento"];';
}


if($etaMedia != null){
	$stringData = $stringData . ' $etaMedia = $_POST["etaMedia"];';
}



$stringData = $stringData . ' $q = mysql_query("SELECT';









if($nome != null){
	$stringData = $stringData . ' nome,';
}

$stringData = $stringData . ' codiceMeta, nome ';

$stringData = $stringData . ' FROM takeatrip_db.Meta WHERE ';



if($altitudine != null){
	$stringData = $stringData . ' altitudine < \'$altitudine\' + 3 and altitudine > \'$altitudine\' - 3';
}

if($temperatura != null){
	$stringData = $stringData . ' temperatura < \'$temperatura\' + 5 and temperatura > \'$temperatura\' - 5';
}

if($pressione != null){
	$stringData = $stringData . ' and pressione < \'$pressione\' + 3 and pressione > \'$pressione\' - 3';
}

if($umidita != null){
	$stringData = $stringData .  ' and umidita < \'$umidita\' + 8 and umidita > \'$umidita\' - 8';
}

if($tempMin != null){
	$stringData = $stringData . ' and tempMin < \'$tempMin\' + 1 and tempMin > \'$tempMin\' - 1';
}

if($tempMax != null){
	$stringData = $stringData . ' and tempMax < \'$tempMax\' + 1 and tempMax > \'$tempMax\' - 1';
}

if($vento != null){
	$stringData = $stringData . ' and velocitaVento < \'$vento\' + 1 and velocitaVento > \'$vento\' - 1';
}


if($etaMedia != null){
	$stringData = $stringData . ' and etaMedia < \'$etaMedia\' + 2 and etaMedia > \'$etaMedia\' - 2';
}



$stringData = $stringData . '");' ;

$stringData = $stringData . ' if($q==null){
	echo("variabile nulla");
}';


$stringData = $stringData . ' while($e=mysql_fetch_assoc($q)){
        $output[]=$e;
}

print(json_encode($output));

mysql_close($conn);';



$stringData = $stringData . '?>' ;


fwrite($fileHandle, $stringData);
fclose($fileHandle);


//print($textFile);


/*


if($conn == null){
	echo "connessione null";
}


$nome = 'puglia';
$altitudine = 10;
$temperatura = 30;
$clima = 'umido';
$etaMedia = 25;

/*
$nome = $_POST["nome"];
$altitudine = $_POST["altitudine"];
$temperatura = $_POST["temperatura"];
$clima = $_POST["clima"];
$etaMedia = $_POST["etaMedia"];
*/

/*
$q = mysql_query("SELECT nome, altitudine, temperatura, clima, etaMedia
				FROM takeatrip_db.Meta
				WHERE nome = '$nome'
				and altitudine in (SELECT altitudine
									FROM takeatrip_db.Meta
									WHERE temperatura = '$temperatura') = '$altitudine'
				and temperatura = '$temperatura'
				and clima = '$clima'
				and etaMedia = '$etaMedia'");
				
				
if($q==null){
	echo("variabile nulla");
}

while($e=mysql_fetch_assoc($q)){
        $output[]=$e;
}

print(json_encode($output));

mysql_close($conn);
*/

?>