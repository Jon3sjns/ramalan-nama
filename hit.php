<?php
error_reporting(0);
include "simple_html_dom.php";
system('clear');
echo "
-----------------------------------------

Ramalan nama

-----------------------------------------
";
echo "Masukan nama-> ";
$nama=trim(fgets(STDIN));
$target="http://planetbiru.com/ramalan/ramalan-nama/?nama=".$nama."&submit=Proses";
//ekse
if($nama){
function req($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
$html=req($target);
$str=str_get_html($html);
$find=$str->find('div[class=pitem]');
echo "\nNama anda ".$nama."\n";
echo "Ramalan?\n";
foreach($find as $jancok){
	echo $jancok->plaintext."\n";
}
echo "Perhatian: Jangan percaya sepenuhnya terhadap ramalan ini:)\n";
}else{
	echo "Harap masukan nama\n";
}
?>
