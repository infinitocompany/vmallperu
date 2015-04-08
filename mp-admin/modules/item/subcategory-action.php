<?php
require_once "../conf.php";
$name = mp_scape($_POST['name']);
$category = mp_scape($_POST['category']);
$link = mp_scape($_POST['link']);
$date = time();
switch($do){
    case 2: 
        $cn->query("INSERT INTO itech_subcategory(SubCatNam, SubCatLnk, SubCatDat, CatID) VALUES('$name', '$link', '$date', '$category')");
        break;
    case 3: 
        $cn->query("UPDATE itech_subcategory SET SubCatSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE SubCatID = '".$_POST['id']."'");
        break;
    case 4: 
        $cn->query("DELETE FROM itech_subcategory WHERE SubCatID = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("UPDATE itech_subcategory SET SubCatNam = '$name', SubCatLnk = '$link', SubCatDat = '$date', CatID = '$category' WHERE SubCatID = '".$_POST['id']."'");
        break;
}
?>