<?php
session_start();
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
    	$idUser="";
    	if(!isset($_POST['username']) and !isset($_POST['password'])){
    		echo 'error--1';
    		return;
    	}
    	else
    	{
    		$idUser=$cn->getField("select id from vmall_users where user='".$cn->scape($_POST['username'])."' and password='".md5($cn->scape($_POST['password']))."'");
    	}
        if($idUser== "")
        {
        	echo "error--2";
        }
        else
        {
        	
            $_SESSION['vmall_session'] = true;
            $_SESSION['vmall_iduser'] = $idUser;
            $id = session_id();
            $cn->query("UPDATE vmall_users SET sessionid = '$id' WHERE user = '".$cn->scape($_POST['username'])."'");
            $_SESSION['vmall_name']=$cn->getField("SELECT CONCAT(name,' ',lastname) FROM vmall_users WHERE user = '".$cn->scape($_POST['username'])."'");
            echo "msg--Bienvenid@ ".$_SESSION['vmall_name'];
        }
        break;
    case 3:
        unset($_SESSION['vmall_session']);
        session_destroy();
        echo 'Hasta la proxima.';
        break;
    case 4:
        if (rpHash($_POST['defaultReal']) == $_POST['defaultRealHash']) {echo 'true';}else{echo 'false';}
        break;
    case 5:
    	if($cn->query("insert into vmall_notifications (NotDatBeg,NotDatEnd,NotTip,UseId,GalId) values('".$_POST['datBeg']."','".$_POST['datEnd']."','".$_POST['notTyp']."','".$_POST['userId']."','".$_POST['galId']."');")){
    		echo 'true';
    	}else{
    		echo 'false';
    	}
    	
        break;
}
?>