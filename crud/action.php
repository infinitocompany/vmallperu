<?php
require_once "../conf.php";
include '../class/Functions.php';
$action = mp_scape($_POST['action']);
$date = time();
switch($action){
    case 1:
        $name = mp_scape($_POST['rname']);
        $lastname = mp_scape($_POST['rlname']);
        $user = mp_scape($_POST['ruser']);
        $password = md5(mp_scape($_POST['rpass']));
        if($cn->query("INSERT INTO vmall_users(name, lastname, user, password, date) VALUES('$name', '$lastname', '$user', '$password', '$date')")){
           echo '0'; 
        }else{
           echo '1'; 
        }
        break;
    case 2:
        if(!isset($_POST['username']) and !isset($_POST['password'])){
            echo 'Ingrese Usuario/Contraseña.';
        }
        if(($password = $cn->getField("SELECT password FROM vmall_users WHERE user = '".$cn->scape($_POST['username'])."'")) == ""){
            echo "El usuario no existe.<br />Porfavor, intente nuevamente.";
            
        }elseif($password != md5($cn->scape($_POST['password']))){
            echo "La contrase&ntilde;a ingresada para el usuario <strong>".$cn->scape($_POST['username'])."</strong> es incorrecto.";
        }else{
            session_start();
            $_SESSION['vmall_session'] = true;
            $id = session_id();
            $cn->query("UPDATE vmall_users SET sessionid = '$id' WHERE user = '".$cn->scape($_POST['username'])."'");
            echo "Bienvenid@ ".$cn->getField("SELECT CONCAT(name,' ',lastname) FROM vmall_users WHERE user = '".$cn->scape($_POST['username'])."'");
            
        }
        break;
    case 3:
        session_start();
        unset($_SESSION['vmall_session']);
        echo 'Hasta la proxima.';
        break;
    case 4:
    	echo "dr".rpHash($_POST['defaultReal']);
    	echo "drh".$_POST['defaultRealHash'];
        if (rpHash($_POST['defaultReal']) == $_POST['defaultRealHash']) {echo 'true';}else{echo 'false';}
        break;
}
?>