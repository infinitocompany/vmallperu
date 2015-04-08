<?php
require_once "../conf.php";
$username = mp_scape($_POST['username']);
$password = md5(mp_scape($_POST['pass']));
$email = mp_scape($_POST['email']);
$description = mp_scape($_POST['description']);
$cn->query("UPDATE itech_user SET UseDes = '$description', UseUse = '$username', UsePas = '$password', UseEma = '$email'");
?>