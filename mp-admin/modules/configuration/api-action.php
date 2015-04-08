<?php
require_once "../conf.php";
$facebook = mp_scape($_POST['facebook']);
$twitter = mp_scape($_POST['twitter']);
$google = mp_scape($_POST['google']);
$linkedin = mp_scape($_POST['linkedin']);
$skype = mp_scape($_POST['skype']);
$youtube = mp_scape($_POST['youtube']);
$vimeo = mp_scape($_POST['vimeo']);
$cn->query("UPDATE itech_configuration SET ConFacLnk = '$facebook', ConTwiLnk = '$twitter', ConGooLnk = '$google', ConLinLnk = '$linkedin', ConSky = '$skype', ConYou = '$youtube', ConVim = '$vimeo'");
?>