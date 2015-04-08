<?php
require_once "../conf.php";
switch($do){
	case 2: 
		$name = mp_scape($_POST['email']);
		$cn->query("INSERT INTO suscription(email) VALUES('$name')");
		break;
	case 3: 
		$cn->query("UPDATE suscription SET status = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE id = '".$_POST['id']."'");
		break;
	case 4:
		$cn->query("DELETE FROM suscription WHERE id = '".$_POST['id']."'");
		break;
	case 5: 
		$name = mp_scape($_POST['email']);
		$cn->query("UPDATE suscription SET email = '$name' WHERE id = '".$_POST['id']."'");
		break;
}
?>