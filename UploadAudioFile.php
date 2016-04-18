<?php 


$path = $_POST['path']; 
$nome = $_POST['nome']; 


$base=$_REQUEST['audio']; 
$binary=base64_decode($base); 
header('Content-Type: audio/mpeg; charset=utf-8'); 
$file = fopen($path . $nome , 'wb'); 
fwrite($file, $binary); 
fclose($file); 
echo 'Audio upload complete!!'; 



?> 

