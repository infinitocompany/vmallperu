<?php
$GLOBALS['printError']="true";
error_reporting(E_ALL);
/*
set_error_handler("my_warning_handler", E_ALL);
function my_warning_handler($errno, $errstr, $errfile, $errline, $errcontext) 
{
    throw new Exception( $errstr );
}
function fError($error)
{
	if($GLOBALS['printError']=="true")
	{
		echo "excepcion: ".$error->getMessage()."/ File: ".$error->getFile()."/ Line: ".$error->getLine(); 
	}
}
*/
?>