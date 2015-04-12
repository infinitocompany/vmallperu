<?php
echo "asasa";
require_once "conf.php";
$cn->query("SELECT ConLog, ConSlo, ConFavIco, ConMas, ConFacLnk, ConTwiLnk, ConGooLnk, ConLinLnk, ConSky, ConYou, ConVim FROM itech_configuration");
session_cache_limiter('nocache,private');
echo "ses".$_SESSION['vmall_session'];
isset($_SESSION['vmall_session']) ? $session="true" : $session="false";
if($session=='true'){
    $sessionid = session_id(); 
    $cn->qry("SELECT id, user, CONCAT(name, ' ', lastname) AS name FROM vmall_users WHERE sessionid = '$sessionid'");
    $rx = $cn->fch();
}else{ 
    $rx = array("id"=>"", "user"=>"", "name"=>"");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <!-- Navbar -->
    <header> 
        <div class="navbar navbar-default navbar-static-top box-red-gradient">
            <div class="container content">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                </button>
                <a class="hide pull-left" href="javascript:void(0);"> <img class="img-responsive center" src="assets/img/canvas-navbar/logo-tipo-48.png" /></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav navbar-right" style="">
                    <li class="active"><a href="./">Inicio11	</a><input class="hide" type="text" id="userid" value="<?php echo $rx['id'];?>"></li>
                    <li class="hidden-xs hidden-sm"><a class="no-link">|</a></li>
                    <?php if($session=='false'){?>
                    <li><a href="registro.php">Registrar</a></li>  
                    <li class="hidden-xs hidden-sm"><a class="no-link">|</a></li>            
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-target="" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">Iniciar Sesi&oacute;n <strong class="caret"></strong></a>
                        <div class="dropdown-menu box-red-dark dropdown-login">
                        <form>
                            <label> Bienvenid@</label>
                            <a class="dropdown-toggle" data-target="#" href="javascript:void(0);" data-toggle="dropdown" ><span class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>  </a>
                            <input type="text"  class="form-control" placeholder="Usuario" id="username" name="username">
                            <input  type="password"  class="form-control" placeholder="Contraseña" id="password" name="password">
                            <a class="pull-left" href="javascript:void(0);" id="login"> Iniciar </a><!--onclick='this.parentNode.submit(); return false;'-->
                            <p class="pull-left">&nbsp|&nbsp </p> 
                            <a class="pull-left" href="registro.php"> Registrarse </a>
                        </form>
                        </div>
                    </li>
                    <?php }else{?>
                    <li class="dropdown"><a class="dropdown-toggle" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">Bienvenido, <?php echo $rx['name'];?> <strong class="caret"></strong></a>
                        <div class="dropdown-menu box-red-dark dropdown-login"> 
                            <a class="dropdown-toggle" data-target="#" href="#" data-toggle="dropdown" ><span class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>  </a>
                            <a class="pull-left" href="javascript:void(0);" id="logout">Cerrar Sesi&oacute;n</a>
                        </div>
                    </li>
                    <!--
                    <li class="hidden-xs hidden-sm"><a class="no-link">|</a></li>
                    <li><a href="productos.php"><img  class="" src="assets/img/canvas-navbar/icono-carrito.png" /></a></li> -->
                    <li class="hidden-xs hidden-sm"><a class="no-link">|</a></li>  
                    <li><a href="#"><img  class="" src="assets/img/canvas-navbar/icono-configuracion.png" /></a></li> 
                    <li class="hidden-xs hidden-sm"><a class="no-link">|</a></li>            
                    <li><a href="preferidos.php"><img  class="" src="assets/img/canvas-navbar/icono-calificacion.png" /></a></li> 
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    </header>
    <!-- /Navbar -->
    <!-- Banner -->
    <section>
    <div class=" box-social-icons no-padding">
        <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
            <a href="<?php echo $cn->result('ConFacLnk');?>"><img  class="img-responsive" src="assets/img/canvas-banner/social-f.png" /></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
            <a href="<?php echo $cn->result('ConTwiLnk');?>"><img class="img-responsive " src="assets/img/canvas-banner/social-t.png" /></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
            <a href="<?php echo $cn->result('ConGooLnk');?>"><img class="img-responsive" src="assets/img/canvas-banner/social-g.png" /></a>
        </div>
    </div>
    <div class="row canvas-banner content no-paddingH">
        <div class="col-xs-12  col-sm-3 col-md-3 box-brand">
            <a href="./"><img class="img-responsive center img-tobe-hide" alt="virtual-mall" src="userfiles/<?php echo $cn->result('ConLog'); ?>" /></a>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 no-padding">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!-- <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol> -->
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                <?php $cn->qry("SELECT BanID, BanNam, BanPri, BanAlt, BanImg FROM itech_banner WHERE BanSta='1'");
                while($rw = $cn->fch()){
                    if($rw['BanPri']=='1'){$add=' active';}else{$add="";}
                    echo '<div class="item '.$add.'"><img src="userfiles/'.$rw['BanImg'].'" alt="'.mp_unscape($rw['BanAlt']).'"></div>';
                }?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon " aria-hidden="true"><img aria-label="Previous" class="img-responsive" src="assets/img/canvas-content/icono-izquierda.jpg" /></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon " aria-hidden="true"><img aria-label="Next" class="img-responsive" src="assets/img/canvas-content/icono-derecha.jpg" /></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 box-mascota " data-popover="true" data-html=true data-content="
            <h3>¿Cuáles son las ventajas de suscribirse?</h3>
            <ul>
                <li>- Notificaciones sin spam</li>
                <li>- Sólo la información que desea</li>
                <li>- Marcadores</li>
                <li>- <a href='informacion.php'>Más información</a></li>
            </ul>">
            <img class="img-responsive center img-tobe-hide" alt="ayuda-guia" src="userfiles/<?php echo $cn->result('ConMas'); ?>" />
        </div>
    </div>
    <!--Banner-->