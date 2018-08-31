<?php

$curl = curl_init();

$search_string = 'pc video games 2017';
$url = 'https://www.amazon.com/s/field-keywords='.$search_string;


curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_COOKIE, true);

$res = curl_exec($curl);
//echo $res;

//https://images-na.ssl-images-amazon.com/images/I/51FIIStfPML._AC_US218_.jpg

preg_match_all('!https://images-na.ssl-images-amazon.com/images/I/[^\s]*?._AC_US218_.jpg!',$res,$matches);

$img = array_values(array_unique($matches[0]));

for ($i=0; $i<count($img); $i++){

    echo "<div style= 'float: left; margin: 10px 0 0 0'>";
    echo "<img src='$img[$i]'>";
    echo "</div>";

}


//print_r($img);

//curl_close($curl);


?>
