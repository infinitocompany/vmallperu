<?php
require_once "../conf.php";
$name = mp_scape($_POST['name']);
$link = mp_scape($_POST['link']);
$status = mp_scape($_POST['status']);
switch($do){
    case 2:
        $cn->query("INSERT INTO itech_menu(MenNam, MenLnk) VALUES('$name', '$link')");
        break;
    case 3: 
        $cn->query("UPDATE itech_menu SET MenSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE MenID = '".$_POST['id']."'");
        break;
    case 4:
        $cn->query("DELETE FROM itech_menu WHERE MenID = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("UPDATE itech_menu SET MenNam = '$name', MenLnk = '$link' WHERE MenID = '".$_POST['id']."'");
        break;
}
?>