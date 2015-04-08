<?php
require_once "../conf.php";
$name = mp_scape($_POST['name']);
$link = mp_scape($_POST['link']);
$menu = mp_scape($_POST['menu']);
$status = mp_scape($_POST['status']);
switch($do){
    case 2:
        $cn->query("INSERT INTO itech_submenu(SubMenNam, SubMenLnk, MenID) VALUES('$name', '$link', '$menu')");
        break;
    case 3: 
        $cn->query("UPDATE itech_submenu SET SubMenSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE SubMenID = '".$_POST['id']."'");
        break;
    case 4:
        $cn->query("DELETE FROM itech_submenu WHERE SubMenID = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("UPDATE itech_submenu SET SubMenNam = '$name', SubMenLnk = '$link', MenID = '$menu' WHERE SubMenID = '".$_POST['id']."'");
        break;
}
?>