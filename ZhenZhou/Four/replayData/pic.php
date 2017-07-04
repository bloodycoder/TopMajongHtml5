<?php
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$_GET["picurl"]);
curl_setopt($curl, CURLOPT_HEADER, 0); 
curl_setopt($curl, CURLOPT_REFERER, '');
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($curl,CURLOPT_TIMEOUT,60);
$data = curl_exec($curl); 
curl_close($curl);
echo $data;
$file_name=$_GET["usrid"].".jpg";
file_put_contents($file_name, $data);
/* use GD process picture*/
echo $_GET["picurl"];
list($width, $height) = getimagesize($file_name);
$newwidth = 640;
$newheight = 640;
$im_raw = imagecreatefromjpeg($file_name);
$im_new = imagecreatetruecolor($newwidth, $newheight);
imagecopyresized($im_new, $im_raw, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($im_new,$file_name);
var_dump(gd_info());
?>