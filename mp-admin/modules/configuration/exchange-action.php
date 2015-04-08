<?php
require_once "../conf.php";
$exchange = mp_scape($_POST['exchange']);
$fecha = date("Y-m-d");
$cn->query("SELECT ExcDat FROM itech_exchange_rate ORDER BY ExcID DESC LIMIT 1");
if($cn->result('ExcDat')==$fecha){
    $cn->query("UPDATE itech_exchange_rate SET ExcRatUSD = '$exchange' WHERE ExcDat='$fecha'");
}else{
    $cn->query("INSERT INTO itech_exchange_rate(ExcDat, ExcRatUSD)VALUES('$fecha', '$exchange')");
}
?>