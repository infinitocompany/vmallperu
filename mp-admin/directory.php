<?php
$mod = isset($_REQUEST['mod']) ? $_REQUEST['mod'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : "";
$do = isset($_POST['do']) ? $_POST['do'] : "";
$page = isset($_POST['mod']) ? (empty($do) ? "-list" : ($do == 1 ? "-form" : "-action")) : "";
switch($mod){
    case 0: include "modules/welcome.php"; break;
    case 1: include "modules/upload.php"; break;
    case 2: include "modules/activate.js"; break;
    case 5: include "modules/access.php"; break;
    case 6: include "modules/forgot_password.php"; break;
    case 7: include "modules/logout.php"; break;

    case 10: include "modules/configuration/access$page.php"; break;
    case 11: include "modules/configuration/appearance$page.php"; break;
    case 12: include "modules/configuration/company$page.php"; break;
    case 13: include "modules/configuration/api$page.php"; break;
    case 14: include "modules/configuration/exchange$page.php"; break;

    case 20: include "modules/webpage/webpage$page.php"; break;
    case 21: include "modules/webpage/banner$page.php"; break;
    case 22: include "modules/webpage/menu$page.php"; break;
    case 23: include "modules/webpage/submenu$page.php"; break;

    case 30: include "modules/information/customer$page.php"; break;
    case 31: include "modules/information/suscription$page.php"; break;
    case 32: include "modules/information/ship$page.php"; break;

    case 40: include "modules/item/item$page.php"; break;
    case 41: include "modules/item/type$page.php"; break;
    case 42: include "modules/item/category$page.php"; break;
    case 43: include "modules/item/subcategory$page.php"; break;

    case 50: include "modules/order/order$page.php"; break;
    case 51: include "modules/order/user$page.php"; break;


    //case 30: include "modules/link/news$page.php"; break;
    //case 31: include "modules/link/youtube$page.php"; break;
    //case 32: include "modules/link/links$page.php"; break;

    //case 60: include "modules/pdf/testimonials$page.php"; break;
    //case 61: include "modules/pdf/report$page.php"; break;

    //case 70: include "modules/email/email$page.php"; break;

    //case 80: include "modules/news/themes$page.php"; break;
    //case 81: include "modules/news/comments$page.php"; break;

    default: include "modules/sale.php"; break;
}
?>