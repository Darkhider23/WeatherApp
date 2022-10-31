<?php

$timestamp = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $timestamp");
header("Last: $timestamp");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");
header("Content-type: image/svg+xml");

function incrementFile($filename) : int{
    if(file_exists($filename)){
 $fp = fopen($filename, "r+")   or die("Failed to open the file.");
 flock($fp, LOCK_EX);
 $count = fread($fp, filesize($filename))+1;
 ftruncate($fp,0);
 fseek($fp, 0);
 fwrite($fp, $count);
 flock($fp,LOCK_UN);
 fclose($fp);
}
else{
    $count=1;
    file_put_contents($filename, $count);
}
return $count;
}
$message = incrementFile("views.txt");
$params = [
    "label" =>"Views",
    "message" =>$message,
    "color" =>"purple",
    "style" =>"for-the-badge"
];

$url = "https://img.shields.io/static/v1?" . http_build_query($params);

echo $url;