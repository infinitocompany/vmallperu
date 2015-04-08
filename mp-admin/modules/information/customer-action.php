<?php
require_once "../conf.php";
switch($do){
	case 2: 
		$name = mp_scape($_POST['name']);
		$file = mp_scape($_POST['file_guid']);
		$date = time();
		$cn->query("INSERT INTO clients(CliNam, CliPho, CliDat) VALUES('$name', '$file', '$category', '$date')");
		break;
	case 3: 
		$cn->query("UPDATE clients SET CliSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE CliID = '".$_POST['id']."'");
		break;
	case 4:
		$cn->query("SELECT CliID, CliPho FROM clients WHERE CliID = '".$_POST['id']."'");
		$row = $cn->fetch();
		unlink("../userfiles/".$row['CliPho']);  
		$cn->query("DELETE FROM clients WHERE CliID = '".$_POST['id']."'");
		break;
	case 5: 
		$name = mp_scape($_POST['name']);
		$file = mp_scape($_POST['file_guid']);
		$date = time();
		$cn->query("UPDATE clients SET CliNam = '$name', CliPho = '$file', CliDat = '$date' WHERE CliID = '".$_POST['id']."'");
		break;
}
?>