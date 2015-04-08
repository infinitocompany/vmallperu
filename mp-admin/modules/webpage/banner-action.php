<?php
require_once "../conf.php";
$name = mp_scape($_POST['name']);
$alt = mp_scape($_POST['alt']);
$file = mp_scape($_POST['file_guid']);
$category = mp_scape($_POST['category']);
$status = mp_scape($_POST['status']);
$date = time();
switch($do){
    case 2:
        $cn->query("INSERT INTO itech_banner(BanNam, BanAlt, BanImg, CatID, BanDat) VALUES('$name', '$alt', '$file', '$category', '$date')");
        break;
    case 3: 
        $cn->query("UPDATE itech_banner SET BanSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE BanID = '".$_POST['id']."'");
        break;
    case 4:
        $cn->query("SELECT BanID, BanImg FROM itech_banner WHERE BanID = '".$_POST['id']."'");
        $row = $cn->fetch();
        unlink("../userfiles/".$row['BanImg']);  
        $cn->query("DELETE FROM itech_banner WHERE BanID = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("UPDATE itech_banner SET BanNam = '$name', BanAlt = '$alt', BanImg = '$file', CatID = '$category', BanDat = '$date' WHERE BanID = '".$_POST['id']."'");
        break;
    case 6: 
        $cn->query("UPDATE itech_banner SET BanPri = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE BanID = '".$_POST['id']."'");
        break;
}
?>