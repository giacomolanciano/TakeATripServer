<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$mysqli = new mysqli(HOSTNAME,DBUSER,DBPASS,DBNAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$codiceViaggio = $_POST["codiceViaggio"];
$ordineTappa = $_POST["ordineTappa"];


$q = $mysqli->multi_query("
DELETE FROM takeatrip_db.Tag 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.NotaTappa 
WHERE
    codViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.ImmagineViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.VideoViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.AudioViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.Tappa 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordine = '$ordineTappa';");


if (!$q) {
    echo "Multi query failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


do {
    if ($res = $mysqli->store_result()) {
        var_dump($res->fetch_all(MYSQLI_ASSOC));
        $res->free();
    }
} while ($mysqli->more_results() && $mysqli->next_result());


?>