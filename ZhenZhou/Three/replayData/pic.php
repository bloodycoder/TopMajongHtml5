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
file_put_contents($_GET["usrid"].".jpg", $data);
?>