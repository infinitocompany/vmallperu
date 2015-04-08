<?php
require_once "../conf.php";
$email = mp_scape($_POST['email']);
$schedule = mp_scape($_POST['schedule']);
$address = mp_scape($_POST['address']);
$city = mp_scape($_POST['city']);
$state = mp_scape($_POST['state']);
$zip = mp_scape($_POST['zip']);
$country = mp_scape($_POST['country']);
$phone = mp_scape($_POST['phone']);
$fax = mp_scape($_POST['fax']);
$map = mp_scape($_POST['map']);
$map_driving = mp_scape($_POST['map_driving']);
$cn->query("UPDATE itech_configuration SET ConEma = '$email', ConSch = '$schedule', ConAdd = '$address', ConCit = '$city', ConSta = '$state', ConZip = '$zip', ConCou = '$country', ConPho = '$phone', ConFax = '$fax', ConMap = '$map', ConGooMap = '$map_driving'");
?>