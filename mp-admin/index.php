<?php
require_once "../conf.php";
session_start();
include isset($_SESSION['cms_sesion']) ? "control_panel.php" : "login.php";
?>