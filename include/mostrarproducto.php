<!-- Content -->
        <div class="canvas-content">
            <div class="row content">
                <div class="customBtns">
                    <span class="arrowPrev"></span>
                    <span class="arrowNext"></span>
                </div>
            <ul id="offer">
            <?php
            $idProducto="";    
            if(isset($_GET['producto']))
            {
            	$idProducto=$_GET['producto'];
            }
            $cn->query("SELECT GalID, TypNam, GalTit, GalMinDes, GalMaxDes, GalImg, 
							GalImgA, GalImgB, GalImgC, GalImgD, GalImgE, GalTexDis, 
							GalSta, CouAbr, GalPriCur, GalPriOff, GalFav, GalDatEnd 
						FROM itech_gallery AS g, itech_country AS c, itech_type AS t 
						WHERE GalSta='1' 
							AND GalID='".$idProducto."'
						    AND g.CouID=c.CouID 
							AND g.TypID=t.TypID 
						ORDER BY GalTit ASC LIMIT 1");
            $GalID="";
            while($row = $cn->fetch()){
            	$GalID=$row['GalID'];
                echo '<li>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="row"></br>
                        <div class="col-xs-12 col-sm-12 col-md-12 " >
                            <div class="inline pull-left"><h1 class="h1-huge">'.$row['GalTexDis'].'</h1></div>
                            <div class="inline pull-left"><h1 class="h1-medium">dscto.</h1></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 " >
                            <div class="inline pull-left"><img class="img-responsive" src="assets/img/canvas-content/estrella-calificacion.png" /></div>
                            <div class="inline  pull-left"><img class="img-responsive" src="assets/img/canvas-content/estrella-calificacion.png" /></div>
                            <div class="inline  pull-left"><img class="img-responsive" src="assets/img/canvas-content/estrella.png" /></div>
                            <div class="inline  pull-left"><img class="img-responsive" src="assets/img/canvas-content/estrella.png" /></div>
                            <div class="inline  pull-left"><img class="img-responsive" src="assets/img/canvas-content/estrella.png" /></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 box-offer-left-desc"></br>
                            <h3>'.$row['GalTit'].'</h3>
                            <h3><a href="#">'.$row['TypNam'].'</a></h3>
                            <p>'.$row['GalMinDes'].'</p>
                            <p>Hasta el '.$row['GalDatEnd'].'</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <p>Precio antiguo: S/.'.$row['GalPriCur'].'</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <p>Precio actual: S/.'.$row['GalPriOff'].'</p>
                            </div>                    
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            </br><h4>'.$row['GalMaxDes'].'</h4></br>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group">
                                    <a href="JavaScript:void(0);" class="btn btn-primary" id="send_facebook">
                                        <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Me gusta
                                    </a>
                                    <a href="JavaScript:void(0);" class="btn btn-info" id="send_notification">
                                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Notificar
                                    </a>
                                    <a href="JavaScript:void(0);" class="btn btn-warning" id="send_favorite">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Favorito
                                    </a>
                                </div>
                                <div class="btn-group" style="float:right;">
                                    <a href="JavaScript:void(0);" class="btn btn-danger" id="send_information">
                                        <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Solicitar
                                    </a>
                                </div>
                            </div> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            </br></br><p>Relacionados '.$row['GalTit'].'</p></br>
                            <div class="carousel_relation carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">                                
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                        </div><!--.row-->
                                    </div><!--.item-->                             
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                            <div class="col-md-3"><a href="#" class="thumbnail"><img src="assets/img/canvas-content/placeholder250x250.jpg" alt="Image" style="max-width:100%;"></a></div>
                                        </div><!--.row-->
                                    </div><!--.item-->                                              
                                </div><!--.carousel-inner-->
                                <a data-slide="prev" href=".carousel_relation" class="left carousel-control carousel-ctrl"><span class="glyphicon " aria-hidden="true"><img aria-label="Previous" class="img-responsive" src="assets/img/canvas-content/icono-izquierda.jpg" /></span><span class="sr-only">Previous</span></a>
                                <a data-slide="next" href=".carousel_relation" class="right carousel-control carousel-ctrl"><span class="glyphicon " aria-hidden="true"><img aria-label="Next" class="img-responsive" src="assets/img/canvas-content/icono-derecha.jpg" /></span><span class="sr-only">Next</span></a>
                            </div><!--.Carousel-->
                        </div>                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <img class="img-responsive image_'.$row['GalID'].'" src="userfiles/'.$row['GalImgA'].'" />
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 box-offer-right-down" >
                        <div class="carousel_item carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">                                
                                    <div class="item active">
                                        <div class="row">';
                if($row['GalImgA']){
                    echo'<div class="col-md-3" style="margin-left:25px;">
                            <a href="JavaScript:void(0);" class="thumbnail replace_image" data-image="userfiles/'.$row['GalImgA'].'" data-id="'.$row['GalID'].'">
                                <img src="userfiles/'.$row['GalImgA'].'" alt="'.$row['GalTit'].'" style="max-width:100%;">
                            </a>
                        </div>';
                }
                if($row['GalImgB']){
                    echo'<div class="col-md-3" style="margin-left:25px;">
                            <a href="JavaScript:void(0);" class="thumbnail replace_image" data-image="userfiles/'.$row['GalImgB'].'" data-id="'.$row['GalID'].'">
                                <img src="userfiles/'.$row['GalImgB'].'" alt="'.$row['GalTit'].'" style="max-width:100%;">
                            </a>
                        </div>';
                }
                if($row['GalImgC']){
                    echo'<div class="col-md-3" style="margin-left:25px;">
                            <a href="JavaScript:void(0);" class="thumbnail replace_image" data-image="userfiles/'.$row['GalImgC'].'" data-id="'.$row['GalID'].'">
                                <img src="userfiles/'.$row['GalImgC'].'" alt="'.$row['GalTit'].'" style="max-width:100%;">
                            </a>
                        </div>
                    </div><!--.row-->
                </div><!--.item-->';
                }
                if($row['GalImgD']){
                    echo'<div class="item">
                            <div class="row">
                                <div class="col-md-3" style="margin-left:25px;">
                                    <a href="JavaScript:void(0);" class="thumbnail replace_image" data-image="userfiles/'.$row['GalImgD'].'" data-id="'.$row['GalID'].'">
                                        <img src="userfiles/'.$row['GalImgD'].'" alt="'.$row['GalTit'].'" style="max-width:100%;">
                                    </a>
                                </div>';
                }
                if($row['GalImgE']){
                    echo'<div class="col-md-3" style="margin-left:25px;">
                            <a href="JavaScript:void(0);" class="thumbnail replace_image" data-image="userfiles/'.$row['GalImgE'].'" data-id="'.$row['GalID'].'">
                                <img src="userfiles/'.$row['GalImgE'].'" alt="'.$row['GalTit'].'" style="max-width:100%;">
                            </a>
                        </div>';
                }
                if(!$row['GalImgC'] || $row['GalImgD']){
                    echo '</div><!--.row-->
                        </div><!--.item-->';
                }
                echo'</div><!--.carousel-inner-->
                    <a style="margin-left:-20px;"data-slide="prev" href=".carousel_item" class="left carousel-control carousel-ctrl"><span class="glyphicon " aria-hidden="true"><img aria-label="Previous" class="img-responsive" src="assets/img/canvas-content/icono-izquierda.jpg" /></span><span class="sr-only">Previous</span></a>
                    <a data-slide="next" href=".carousel_item" class="right carousel-control carousel-ctrl"><span class="glyphicon " aria-hidden="true"><img aria-label="Next" class="img-responsive" src="assets/img/canvas-content/icono-derecha.jpg" /></span><span class="sr-only">Next</span></a>
                </div><!--.Carousel--></div>
                </div>
            </li>';
                
            }
            if(isset($_GET['notificacion']))
            {
            	if($_GET['notificacion']=='true')
            	{
            		if($cn->query("insert into notifications_gallery (GalId,UseId) values('".$GalID."','".$_SESSION['vmall_iduser']."')")){
            			//echo 'true';
            		}else{
            			//echo 'false';
            		}
            	}
            }
            ?>
        </ul>
        <div class="holder"></div>
        </div>        
    <!-- /Content -->