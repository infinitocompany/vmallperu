<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8">
        <title>VirtualMall | Productos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-submenu.css" rel="stylesheet" type="text/css">
        <!-- Añadido Calendario -->
        <link href="assets/css/datepick.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-main.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-form.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/component.css" rel="stylesheet" type="text/css">
        <link href="lib/jPages/jPages.css"rel="stylesheet" type="text/css">
    </head>
    <?php $active=true; ?>
    <?php include("include/header.php"); ?>
    <?php include("include/menu.php"); ?>
    <!-- Content -->
        <div class="canvas-content no-paddingH">
            <div class="row content no-paddingH">
                <?php //include("include/top.php");?>
                <div style="margin-top:10px;"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 canvas-search box-red-lighter ">
                    <div class="col-xs-3 col-sm-3 col-md-3 no-padding"><h1>QUIERO </h1></div>
                    <div class="col-xs-9 col-sm-9 col-md-9 ">
                        <div class="box-search box-red-dark round-3">
                            <form class="form row" class="" method="post" action="search" accept-charset="UTF-8">
                                <div class="col-xs-10 col-sm-11 col-md-11 no-padding">
                                    <input  type="text"  class="form-control" placeholder="¿Qué estás buscando?" id="inputsearch" name="inputsearch">
                                </div>
                                <div class="col-xs-2 col-sm-1 col-md-1 no-padding">
                                    <button type="button" class="btn btn-default" aria-label="Left Align" id="buttonsearch"><span class="glyphicon glyphicon-search img-rotation" aria-hidden="true"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
                    <div class="row">
                        <ul id="itemContainer" class="og-grid">
                    <?php
                        $search = isset($_GET['search']) ? strtolower(mp_scape($_GET['search'])) : "";
                        $cn->query("SELECT GalTit, GalMinDes, GalMaxDes, GalImg, GalSta, CouAbr, GalPriCur, GalPriOff, GalFav FROM itech_gallery AS g, itech_country AS c WHERE GalSta='1' AND LOWER(CONCAT(GalTit,' ',GalMinDes)) like '%$search%' AND g.CouID=c.CouID ORDER BY GalTit ASC");
                        $var=0;
                        while($row = $cn->fetch()){
                            //if($var==0){echo '<ul id="og-grid" class="og-grid">';}
                            if($var==3){
                                $var = -1;
                                echo '<li style="margin-right:0px !important;"><div class=" box-item-content box-red-gradient center-text"><div>Cámaras</div></div><div class="col-xs-8 col-sm-8 col-md-8"><div style="font-size:17px;font-weight:bold;">'.$row['GalTit'].'</div></div>';
                            }else{
                                echo '<li><div class=" box-item-content box-red-gradient center-text"><div>Cámaras</div></div><div class="col-xs-8 col-sm-8 col-md-8"><div style="font-size:17px;font-weight:bold;">'.$row['GalTit'].'</div></div>';                             
                            }
                            if($row['CouAbr']=='PE'){$img='<img class="img-responsive pull-right" src="assets/img/canvas-content/nacionalidad.png" />';}
                            if($row['GalFav']==0){$fav='<img class="img-responsive " src="assets/img/canvas-content/estrella.jpg" />';}else{$fav='<img class="img-responsive " src="assets/img/canvas-content/estrella-calificacion.jpg" />';}
                            echo '<div class="col-xs-4 col-sm-4 col-md-4">'.$img.'</div>
                                <div class="col-xs-8 col-sm-8 col-md-8 box-description-prod-up">
                                    <h2 no-paddingH>S/. '.$row['GalPriCur'].'</h2>
                                    <h4>'.$row['GalMinDes'].'</h4>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 "></div>   
                                <a href="JavaScript:void(0);" data-largesrc="userfiles/'.$row['GalImg'].'" data-title="'.$row['GalTit'].'" data-description="'.$row['GalMaxDes'].'">
                                   <img class="img-responsive" src="userfiles/'.$row['GalImg'].'" />
                                </a>
                                <div class="col-xs-12 col-sm-12 col-md-12 box-description-prod-down">
                                    <div class="inline"><a href="#" id="'.$row['GalID'].'">'.$fav.'</a></div>
                                    <div class="inline"><img class="img-responsive img-options" data-toggle="modal" data-target="#modalItemOpt" src="assets/img/canvas-content/modificar.jpg" /></div>
                                    <div class="inline megusta"><a href="#" id="'.$row['GalID'].'"><img class="img-responsive" src="assets/img/canvas-content/megusta.png" /></a></div>
                                </div>
                            </li>';
                            $var++;
                            /*if($var==3){
                                echo '</ul><br /><br />';$var=0;
                            }*/
                        }
                    ?>
                        </ul>
                    </div>
                </div>                
            </div>
            <div class="holder"></div>
        </div>
    <!-- /Content -->
    </section>
    <?php include("include/modal.php");?>
    <?php include("include/footer.php"); ?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/crud_ajax.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.datepick.js"></script>
    <script type="text/javascript" src="assets/js/jquery.custom-main.js"></script>
    <script src="assets/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="lib/jPages/jPages.js"></script>
    <script>
        $(function() {
            $("div.holder").jPages({
                containerID: "itemContainer",
                previous : "«",
                next : "»",
                perPage: 8,
                midRange: 8,
                direction: "random",
                animation: "flipInY"
            });
        });
    </script>
    <script src="assets/js/grid.js"></script>
    <script>
        $(function() {
            Grid.init();
        });
    </script>
</html>
