<?php
if(!isset($_POST['username']) and !isset($_POST['password'])) exit();
require_once "../conf.php";
if(($password = $cn->getField("SELECT UsePas FROM itech_user WHERE UseUse = '".$cn->scape($_POST['username'])."'")) == ""){
    echo $password;
    exit("El usuario no existe.<br />Porfavor, intente nuevamente.");}
elseif($password != md5($cn->scape($_POST['password']))) 
    exit("La contrase&ntilde;a ingresada para el usuario <strong>".$cn->scape($_POST['username'])."</strong> es incorrecto. <a href='#' class='forgot_password'>Recordar Contrase&ntilde;a.</a>");
else{
    session_start();
    $_SESSION['cms_sesion'] = true;
}
?>