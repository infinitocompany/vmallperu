<?php
require_once "../conf.php";
$logo = mp_scape($_POST['logo_guid']);
$slogan = mp_scape($_POST['slogan']);
$favicon = mp_scape($_POST['favicon_guid']);
$mascot = mp_scape($_POST['mascot_guid']);
$cn->query("SELECT ConLog, ConFavIco, ConMas FROM itech_configuration");
$row = $cn->fetch();
$s_logo='';$s_favicon = '';$s_mascot = '';
if($logo != $row['ConLog']){
    unlink("../userfiles/".$row['ConLog']);
    $s_logo = "ConLog = '".$logo."',";
}
if($favicon != $row['ConFavIco']){
    unlink("../userfiles/".$row['ConFavIco']);
    $s_favicon = "ConFavIco = '".$favicon."',";
}
if($mascot != $row['ConMas']){
    unlink("../userfiles/".$row['ConMas']);
    $s_favicon = "ConMas = '".$mascot."',";
}
$cn->query("UPDATE itech_configuration SET ".$s_logo.$s_favicon.$s_mascot." ConSlo = '$slogan'");
?>