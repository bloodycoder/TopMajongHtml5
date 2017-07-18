<?php
$url_to_fetch = $_GET["picurl"];
$roomid = $_GET["roomid"];
echo strlen($_GET["picurl"]);
if(strlen($_GET["picurl"])<10){
	$url_to_fetch = "http://123.207.172.12/TopMajongHtml5/man.jpg";
}
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url_to_fetch);
curl_setopt($curl, CURLOPT_HEADER, 0); 
curl_setopt($curl, CURLOPT_REFERER, '');
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($curl,CURLOPT_TIMEOUT,60);
$data = curl_exec($curl); 
curl_close($curl);
echo $data;
if(!is_file("./pic")){
	mkdir("./pic");
}
$file_name="./pic/".$_GET["usrid"].".jpg";
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