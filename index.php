<?php 
session_start();
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8">
        <title>VirtualMall | Inicio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-submenu.css" rel="stylesheet" type="text/css">
        <!--<link href="assets/css/style-menu-core.css" rel="stylesheet" type="text/css">-->
        <link href="assets/css/style-main.css" rel="stylesheet" type="text/css">
        <!--  <link href="assets/css/style-menu.css" rel="stylesheet" type="text/css">-->
        <link href="assets/css/style-form.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-pages.css"rel="stylesheet" type="text/css">
        <link href="lib/chosen/chosen.css"rel="stylesheet" type="text/css">
        <link href="lib/jPages/jPages.css"rel="stylesheet" type="text/css">
        <link href="assets/vmallperu/fonts/style.css"rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/css/datepicker.css">
    </head>
    <body>
   
    <?php include("include/header.php"); ?>
    <?php include("include/menu.php"); ?>
    
   <div id="content"> 
    <?php 
    
    if(isset($_GET['page']))
    {
    	$include.="include/".$_GET['page'].".php";
    	include($include);
    }
    else
    {
    	include("include/main.php");
    }
    
    
    ?>
    </div>
    <?php include("include/modal.php");?>
    <?php include("include/notification.php");?>
    <?php include("include/detail.php");?>
    <?php include("include/footer.php");?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/crud_ajax.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.datepick.js"></script>
    <script type="text/javascript" src="assets/js/jquery.datepick.js"></script>
    <script type="text/javascript" src="assets/js/customFunctions.js"></script>
    <script type="text/javascript" src="assets/js/jquery.custom-main.js"></script>
    <script type="text/javascript" src="lib/chosen/chosen.jquery.js"></script>
    <script type="text/javascript" src="lib/jPages/jPages.js"></script>
    <script   type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
    <script>
        $("#number").chosen();
        $(function() {
        	$('#btn1 .ballons').text(getNotifications());
        	$('#btn2 .ballons').text(getFavorites());
        	$('#notification_begin').datepicker({
                format: "yyyy-mm-dd"
            }); 
        	$('#notification_end').datepicker({
        		format: "yyyy-mm-dd"
            }); 
            $("div.holder").jPages({
                containerID: "itemContainer",
                previous : "«",
                next : "»",
                perPage:3,
                midRange: 3,
                direction: "random",
                animation: "flipInY",
                first: true,
                last: true
            });
            $("#number").change(function(){
                /* get new nº of items per page */
                var newPerPage = parseInt( $(this).val() );
                /* destroy jPages and initiate plugin again */
                $("div.holder").jPages("destroy").jPages({
                    containerID: "itemContainer",
                    perPage    : newPerPage
                });
            });
        });
    </script>
</html>
