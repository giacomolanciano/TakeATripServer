<?php

/*
$path = 'facebo10207401508029883/';
$nome = 'prova.jpg';
*/


$path = $_POST["path"];
$nome = $_POST["nome"];


    $base=$_REQUEST["image"];
    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen($path . $nome , 'wb');
    fwrite($file, $binary);
    fclose($file);
    echo 'Image upload complete!!';



?>


 
 