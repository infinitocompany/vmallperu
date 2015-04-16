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
    <!-- Content -->
    <div class="canvas-content">
        <div class="row content no-paddingH">
            <div style="text-align: right;">
                <select id="number" data-placeholder="Número de ofertas por página" style="width:210px;">
                    <option selected="true"></option>
                    <option>3</option>
                    <option>6</option>
                    <option>9</option>
                    <option>12</option>
                    <option>15</option>
                </select>
            </div>
            <!--<div style="float:right;text-align:left;">
                <select class="box-select-filter pull-right box-red-dark" id="searchType" style="width:200px;">
                    <option>OFERTA</option>
                    <option>TIENDA</option>
                    <option>MARCA</option>
                </select>
            </div>-->
        </div>
        
        <div class="row content">
            <ul id="itemContainer">
        <?php    
        $cn->query("SELECT GalID, GalTit, GalMinDes, GalMaxDes, GalImgA, GalImgB, GalSta, CouAbr, GalPriCur, GalPriOff, GalTexDis, GalFav,GalFacLin FROM itech_gallery AS g, itech_country AS c WHERE GalSta='1' AND g.CouID=c.CouID AND Date_format(now(),'%d/%m/%Y') BETWEEN g.GalDatSta AND g.GalDatEnd ORDER BY GalTit ASC");
        while($row = $cn->fetch()){    
            echo '<li><div class="col-xs-12 col-sm-4 col-md-4">
                <div class="box-item-index box-red-gradient">
                    <img class="img-responsive" src="userfiles/'.$row['GalImgA'].'"/> 
                    <div class="box-item-description box-opacity"> 
                    <ul>
                        <li><h1 class="h1-huge text-center">'.$row['GalTexDis'].'</h1></li>
                        <li><h2 class="text-center">&Aacute;ntes S/. '.$row['GalPriCur'].' ahora S/. '.$row['GalPriOff'].'</h2></li>
                        <li><h4 class="text-center">'.$row['GalMinDes'].'</h4></li>
                        <li><label class="btnComprar"><input type="submit" class="inputcomprar" data-id="'.$row['GalID'].'" data-facelin="'.$row['GalFacLin'].'" data-user="'.$_SESSION['vmall_iduser'].'" data-title="'.$row['GalTit'].'" data-description="'.$row['GalMaxDes'].'" data-image="userfiles/'.$row['GalImgB'].'" name="inputcomprar" value="Ver M&aacute;s" style="width:142px;"/></label></li>
                    </ul>  
                    </div> 
                </div>
            </div></li>';
        }
        ?>
            </ul>
        </div>
        <div class="holder"></div>
        <!-- /Content -->
    </section>
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
        	$('#btn2 .ballons').text('7');
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
