<?php require_once "conf.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="row"></br>
                    <ul class="og-grid">
                    <?php    
                        $cn->query("SELECT GalTit, GalMinDes, GalMaxDes, GalImg, GalSta, CouAbr, GalPriCur, GalPriOff, GalFav FROM itech_gallery AS g, itech_country AS c WHERE GalSta='1' AND g.CouID=c.CouID ORDER BY GalTit ASC LIMIT 2");
                        while($row = $cn->fetch()){ 
                            echo '<li><div class="col-xs-8 col-sm-8 col-md-8"><div style="font-size:17px;font-weight:bold;">'.$row['GalTit'].'</div></div>';
                            if($row['CouAbr']=='PE'){$img='<img class="img-responsive pull-right" src="assets/img/canvas-content/nacionalidad.png" />';}
                            if($row['GalFav']==0){$fav='<img class="img-responsive " src="assets/img/canvas-content/estrella.jpg" />';}else{$fav='<img class="img-responsive " src="assets/img/canvas-content/estrella-calificacion.jpg" />';}
                            echo '<div class="col-xs-4 col-sm-4 col-md-4">'.$img.'</div>
                                <div class="col-xs-8 col-sm-8 col-md-8 box-description-prod-up ">
                                    <h2 no-paddingH>S/. '.$row['GalPriCur'].'</h2>
                                    <h4>'.$row['GalMinDes'].'</h4>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 "></div>   
                                <a href="javascript:void(0);" data-largesrc="userfiles/'.$row['GalImg'].'" data-title="'.$row['GalTit'].'" data-description="'.$row['GalMaxDes'].'">
                                   <img class="img-responsive" src="userfiles/'.$row['GalImg'].'" />
                                </a>
                                <div class="col-xs-12 col-sm-12 col-md-12 box-description-prod-down ">
                                  <div class="inline"><a href="#" id="'.$row['GalID'].'">'.$fav.'</a></div>
                                  <div class="inline"><img class="img-responsive img-options" data-toggle="modal" data-target="#modalItemOpt" src="assets/img/canvas-content/modificar.jpg" /></div>
                                  <div class="inline megusta"><a href="#" id="'.$row['GalID'].'"><img class="img-responsive" src="assets/img/canvas-content/megusta.png" /></a></div>
                                </div>
                            </li>';                            
                        }
                    ?>                       
                    </ul>     
                </div>
            </div>
