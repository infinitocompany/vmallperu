<?php
require_once "../conf.php";
$name = mp_scape($_POST['name']);
$submenu = mp_scape($_POST['smenu']);
$description = mp_scape($_POST['description']);
$date = time();
switch($do){
    case 2: 
        $cn->query("INSERT INTO itech_category(CatNam, CatDes, CatDat, SubMenID) VALUES('$name', '$description', '$date', '$submenu')");
        break;
    case 3: 
        $cn->query("UPDATE itech_category SET CatSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE CatID = '".$_POST['id']."'");
        break;
    case 4: 
        $cn->query("DELETE FROM itech_category WHERE CatID = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("UPDATE itech_category SET CatNam = '$name', CatDes = '$description', CatDat = '$date', SubMenID = '$submenu' WHERE CatID = '".$_POST['id']."'");
        break;
}
?>