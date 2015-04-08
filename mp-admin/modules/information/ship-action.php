<?php
require_once "../conf.php";
switch($do){
	case 2: 
		$name = mp_scape($_POST['name']);
		$price = mp_scape($_POST['price']);
		$cn->query("INSERT INTO shipping_costs(city,rate) VALUES('$name','$price')");
		break;
	case 3: 
		$cn->query("UPDATE shipping_costs SET status = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE id = '".$_POST['id']."'");
		break;
	case 4:
		$cn->query("DELETE FROM shipping_costs WHERE id = '".$_POST['id']."'");
		break;
	case 5: 
		$name = mp_scape($_POST['name']);
		$price = mp_scape($_POST['price']);
		$cn->query("UPDATE shipping_costs SET city = '$name', rate='$price' WHERE id = '".$_POST['id']."'");
		break;
}
?>