<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8">
        <title>VirtualMall | Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-submenu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-menu-core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-main.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-form.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/component.css" rel="stylesheet" type="text/css">
        <link href="lib/captcha/jquery.realperson.css" rel="stylesheet" type="text/css">
    </head>  
    <body>
    <?php include("include/header.php"); ?>
    <?php include("include/menu.php"); ?>
    <!-- Content -->
    <div class="canvas-content">
        <div class="row content">
            <?php include("include/top.php");?>
            <div class="col-xs-12 col-sm-8 col-md-8 ">
                <div class="box-item-right">
                    <form><input type="hidden" id="defaultRealHash" value="">
                    <h2>Reg&iacute;strate hoy !</h2>
                    <div class="col-xs-12 col-sm-6 col-md-6 ">
                        <input type="text-half" id="rname" placeholder="Nombres" name="rname">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 ">
                        <input type="text-half" id="rlastname" placeholder="Apellidos" name="rlastname"> 
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 ">                 
                        <input type="text-large" id="ruser" placeholder="Correo Electr&oacute;nico" name="ruser">  
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 ">               
                       <input type="password-large" id="rpass" placeholder="Contraseña" name="rpass">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 ">               
                        <input type="text-half" id="defaultReal" name="defaultReal" style="text-transform: uppercase;">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 "> 
                        <input type="checkbox" id="rcheck"><a href="terminos-condiciones.php" target="_blank"> Términos y Condiciones</a></input>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <label class="btnComprar"><input type="submit" id="buttonregister" name="buttonregister" value="Registrarse"/></label>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script type="text/javascript" src="assets/js/jquery.custom-main.js"></script>
    <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="assets/js/grid.js"></script> 
    <script type="text/javascript" src="lib/captcha/jquery.plugin.min.js"></script> 
    <script type="text/javascript" src="lib/captcha/jquery.realperson.js"></script> 
    <script>
    $(function() {
        $('#defaultReal').realperson({chars: $.realperson.alphanumeric});
        Grid.init();
    });
    </script>
</html>
