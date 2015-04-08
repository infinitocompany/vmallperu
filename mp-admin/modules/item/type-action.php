<?php
require_once "../conf.php";
$name = mp_scape($_POST['name']);
$address = mp_scape($_POST['address']);
$agent = mp_scape($_POST['agent']);
$web = mp_scape($_POST['web']);
$email = mp_scape($_POST['email']);
$phone = mp_scape($_POST['phone']);
$date = time();
switch($do){
    case 2: 
        $cn->query("INSERT INTO itech_type(TypNam, TypAdd, TypAge, TypWeb, TypEma, TypPho, TypDat) VALUES('$name', '$address', '$agent', '$web', '$email', '$phone', '$date')");
        break;
    case 3: 
        $cn->query("UPDATE itech_type SET TypSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE TypID = '".$_POST['id']."'");
        break;
    case 4: 
        $cn->query("DELETE FROM itech_type WHERE TypID = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("UPDATE itech_type SET TypNam = '$name', TypAdd = '$address', TypAge = '$agent', TypWeb = '$web', TypEma = '$email', TypPho = '$phone', TypDat = '$date' WHERE TypID = '".$_POST['id']."'");
        break;
}
?>