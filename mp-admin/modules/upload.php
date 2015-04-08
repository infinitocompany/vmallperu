<?php
function verifyFile($file){
	$search = array(' ','á','à','â','ã','ª','Á','À','Â','Ã','é','è','ê','É','È','Ê','í','ì','î','Í','Ì','Î','ò','ó','ô','õ','º','Ó','Ò','Ô','Õ','ú','ù','û','Ú','Ù','Û','ç','Ç','Ñ','ñ');
	$replace = array('_','a','a','a','a','a','A','A','A','A','e','e','e','E','E','E','i','i','i','I','I','I','o','o','o','o','o','O','O','O','O','u','u','u','U','U','U','c','C','N','n');
	$file = trim(str_replace($search, $replace, utf8_decode($file)));
	return preg_replace('/[^A-Za-z0-9\_\.\-]/', '', $file);
}
$name = substr(md5(uniqid(rand())), 0, 6)."_".verifyFile($_FILES['Filedata']['name']);
if(copy($_FILES['Filedata']['tmp_name'], "../userfiles/$name")) echo $name;
?>