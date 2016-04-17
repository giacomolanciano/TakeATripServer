<?php 

$path = "";
$image = "logodef.png";

$track = $path . $image ; 

if (file_exists($track)) { 
header("Content-Type: image/png"); 
header('Content-Length: ' . filesize($track)); 
header('Content-Disposition: inline;'); 
header('Content-File: ' . $image); 
header('X-Pad: avoid browser bug'); 
header('Cache-Control: no-cache'); 
readfile($track); 
exit; 
} else { 
header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found', true, 404); 
echo "no file"; 
} 

?>