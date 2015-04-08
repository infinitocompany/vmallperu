<?php
require_once "../conf.php";
$group = mp_scape($_POST['group']);
$country = mp_scape($_POST['country']);
$category = mp_scape($_POST['category']);
$name = mp_scape($_POST['name']);
$price = mp_scape($_POST['price']);
$priceoff = mp_scape($_POST['priceoff']);
$pricedis = mp_scape($_POST['pricedis']);
$discount = mp_scape($_POST['discount']);
$file = mp_scape($_POST['file_guid']);
$imagena = mp_scape($_POST['imagena_guid']);
$imagenb = mp_scape($_POST['imagenb_guid']);
$imagenc = mp_scape($_POST['imagenc_guid']);
$imagend = mp_scape($_POST['imagend_guid']);
$imagene = mp_scape($_POST['imagene_guid']);
$faclin=mp_scape($_POST['faclin']);
$description = mp_scape($_POST['description']);
$content = mp_scape($_POST['content']);
$start = mp_scape($_POST['start']);
$end = mp_scape($_POST['end']);
$date = time();
switch($do){
    case 2: 		
        $cn->query("INSERT INTO itech_gallery(CouID, TypID, GalTit, GalPriCur, GalPriOff, GalPriDis, GalTexDis, GalImg, GalImgA, GalImgB, GalImgC, GalImgD, GalImgE, GalMinDes, GalMaxDes, GalDat, GalDatSta, GalDatEnd,GalFacLin) VALUES("
                . "'$country', '$group', '$name', '$price', '$priceoff', '$pricedis', '$discount', '$file', '$imagena', '$imagenb', '$imagenc', '$imagend', '$imagene', '$description', '$content', '$date', '$start', '$end','$faclin')");
        $cn->query("SELECT GalID FROM itech_gallery ORDER BY GalID DESC LIMIT 1");
        $gal=$cn->result('GalID');		
        foreach ($_REQUEST['category'] as $cat){
            $cn->query("INSERT INTO itech_gallery_subcategory(GalID, SubCatID) VALUES('$gal', '$cat')");
        }
        break;
    case 3: 
        $cn->query("UPDATE itech_gallery SET GalSta = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE GalID = '".$_POST['id']."'");
        break;
    case 4:
        $cn->query("SELECT GalID, GalImg, GalImgA, GalImgB, GalImgC, GalImgD, GalImgE FROM itech_gallery WHERE GalID = '".$_POST['id']."'");
        $row = $cn->fetch();
        unlink("../userfiles/".$row['GalImg']);
        unlink("../userfiles/".$row['GalImgA']);        
        unlink("../userfiles/".$row['GalImgB']);        
        unlink("../userfiles/".$row['GalImgC']);        
        unlink("../userfiles/".$row['GalImgD']);        
        unlink("../userfiles/".$row['GalImgE']);
        $cn->query("DELETE FROM itech_gallery WHERE GalID = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("SELECT GalID, GalImg, GalImgA, GalImgB, GalImgC, GalImgD, GalImgE FROM itech_gallery WHERE GalID = '".$_POST['id']."'");
        $row = $cn->fetch();
        if($row['GalImg']!=$file){unlink("../userfiles/".$row['GalImg']);}
        if($row['GalImgA']!=$imagena){unlink("../userfiles/".$row['GalImgA']);}
        if($row['GalImgB']!=$imagenb){unlink("../userfiles/".$row['GalImgB']);}
        if($row['GalImgC']!=$imagenc){unlink("../userfiles/".$row['GalImgC']);}
        if($row['GalImgD']!=$imagend){unlink("../userfiles/".$row['GalImgD']);}
        if($row['GalImgE']!=$imagene){unlink("../userfiles/".$row['GalImgE']);}        
        $cn->query("UPDATE itech_gallery SET CouID = '$country', TypID = '$group', GalTit = '$name', GalPriCur = '$price', GalPriOff = '$priceoff', GalPriDis = '$pricedis', GalTexDis = '$discount', GalImg = '$file', GalImgA = '$imagena', GalImgB = '$imagenb', GalImgC = '$imagenc', GalImgD = '$imagend', GalImgE = '$imagene', GalMinDes = '$description', GalMaxDes = '$content', GalDat = '$date', GalDatSta = '$start', GalDatEnd = '$end',GalFacLin='$faclin' WHERE GalID = '".$_POST['id']."'");
        $cn->query("DELETE FROM itech_gallery_subcategory WHERE GalID = '".$_POST['id']."'");
        foreach ($_REQUEST['category'] as $cat){
            $cn->query("INSERT INTO itech_gallery_subcategory(GalID, SubCatID) VALUES('".$_POST['id']."', '$cat')");
        }		
        break;
    case 6: 
        $cn->query("UPDATE itech_gallery SET GalPro = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE GalID = '".$_POST['id']."'");
        break;
}
?>