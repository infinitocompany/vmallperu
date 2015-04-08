<?php
require_once "../conf.php";
switch($do){
    case 5: 
        $name = mp_scape($_POST['name']);
        $content = mp_scape($_POST['content']);
        $title = mp_scape($_POST['title']);
        $description = mp_scape($_POST['description']);
        $keywords = mp_scape($_POST['keywords']);
        $cn->query("UPDATE itech_web_page SET WebPagNam = '$name',WebPagCon = '$content', WebPagTit = '$title', WebPagDes = '$description', WebPagKey = '$keywords' WHERE WebPagID = '".$_POST['id']."'");
        break;
}
?>