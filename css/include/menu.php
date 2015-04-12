<?php require_once "conf.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <!-- Menu-->
    <div class="row ">
        <div class="content no-paddingH">
            <div class="col-xs-12 col-sm-4 col-md-4 no-padding">
                <div class="box-red-dark principal-menu">
                    <ul>
                        <?php $cn->query("SELECT MenID, MenNam, MenLnk, MenPas FROM itech_menu WHERE MenSta='1'");
                        while($row = $cn->fetch()){ 
                            if(mp_unscape($row['MenLnk'])!='collapse' && mp_unscape($row['MenLnk'])!='pass'){
                                echo '<li><a href="'.mp_unscape($row['MenLnk']).'.php"><div>'.mp_unscape($row['MenNam']).'<img class="img-responsive pull-right" src="assets/img/canvas-content/icono-derecha.jpg" /></div></a></li>';
                            }if(mp_unscape($row['MenLnk'])=='pass'){
                                echo '<li><a href="JavaScript:void(0);" class="pass_'.mp_unscape($row['MenPas']).'"><div>'.mp_unscape($row['MenNam']).'<img class="img-responsive pull-right" src="assets/img/canvas-content/icono-derecha.jpg" /></div></a></li>';
                            }if(mp_unscape($row['MenLnk'])=='collapse'){
                                echo '<li><a data-toggle="collapse" href="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu"><div>'.mp_unscape($row['MenNam']).'<img class="img-responsive pull-right" src="assets/img/canvas-content/icono-derecha.jpg" /></div></a>
                                <div class="collapse box-red-dark" id="collapseMenu">
                                    <ul class="nav navbar-nav navbar-menu-category no-padding">';
                                ?><!--Menu1--><?php
                                $cn->qry("SELECT SubMenID, SubMenNam, SubMenLnk, SubMenDat FROM itech_submenu WHERE SubMenSta='1' AND MenID='".$row['MenID']."'");
                                while($rw = $cn->fch()){
                                    if(mp_unscape($rw['SubMenLnk'])!='dropdown'){
                                        echo '<li><a href="'.mp_unscape($rw['SubMenLnk']).'.php">'.mp_unscape($rw['SubMenNam']).'<img class="img-responsive pull-right" src="assets/img/canvas-content/icono-derecha.jpg" /></a></li>';  
                                    }else{
                                        echo '<li class="dropdown dropdown-large opensub" id="'.mp_unscape($rw['SubMenDat']).'"><a href="javascript:void(0);" data-id="'.mp_unscape($rw['SubMenDat']).'" class="dropdown-toggle sub_menu" data-toggle="dropdown">'.mp_unscape($rw['SubMenNam']).'<img class="img-responsive pull-right" src="assets/img/canvas-content/icono-derecha.jpg" /></a>
                                        <ul class="dropdown-menu dropdown-menu-large row box-red-dark dropdown-submenu">';
                                        $cn->qury("SELECT CatID, CatNam, CatDes FROM itech_category WHERE CatSta='1' AND SubMenID='".$rw['SubMenID']."'");
                                        $key=true; $col=0;
                                        while($r = $cn->ftch()){
                                            if($col==0){ echo '<li class="col-sm-3"><ul>';}
                                            if(mp_unscape($r['CatDes'])!='dropdown'){
                                                echo '<li><a href="'.$r['CatDes'].'">'.$r['CatNam'].'</a></li>';
                                            }else{
                                                echo '<li class="dropdown-header">'.$r['CatNam'].'</li>';
                                                $cn->queryB("SELECT SubCatID, SubCatNam, SubCatLnk, SubCatDat FROM itech_subcategory WHERE SubCatSta='1' AND CatID='".$r['CatID']."'");
                                                while($rx = $cn->fetchB()){
                                                    echo '<li><a href="'.$rx['SubCatLnk'].'">'.$rx['SubCatNam'].'</a></li>';
                                                }                                                
                                            }
                                            $col++;if($col==2){ echo '</ul></li>';$col=0;}
                                        }
                                        if($col==1){ echo '</ul></li>';}
                                        echo '</ul></li>';
                                    }
                                }
                                echo '</ul></div></li>';
                            }
                        }
                        ?>
                    </ul>             
                </div>
            </div>
            <!--Menu-->
            <!-- Search -->
            <?php if(!$active){?>
            <div class="col-xs-12 col-sm-8 col-md-8 canvas-search box-red-lighter ">
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
            <?php }else{ ?>
            <div class="col-xs-12 col-sm-8 col-md-8 box-gray-lighter ">
                <div class="col-xs-9 col-sm-9 col-md-9 ">
                    <ol class="breadcrumb" style="margin:19px 0;">
                        <li><a href="#">Tecnología</a></li>
                        <li><a href="#">Cámaras</a></li>
                        <li class="active">Reflex</li>
                    </ol>                  
                </div>
            </div>
            <?php }?>
        </div>
        <!-- /Search -->