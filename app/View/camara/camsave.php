<?php
$rawData = $_POST['imgBase64'];
$filteredData = explode(',', $rawData);
$nombre = $_POST['nombre'];

$unencoded = base64_decode($filteredData[1]);
$randomName = rand(0, 99999);;
//Create the image 
$fp = fopen($nombre.'.png', 'w');
fwrite($fp, $unencoded);
fclose($fp);