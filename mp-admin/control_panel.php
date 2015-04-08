<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Infinito Tech. - CMS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../img/mp-admin/favicon.ico" rel="shortcut icon" >
        <link href="../css/reset.css" rel="stylesheet" type="text/css" />
        <link href="../css/mp_admin.css" rel="stylesheet" type="text/css" />
        <link href="../css/text.css" rel="stylesheet" type="text/css" />
        <link href="../lib/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />   
        <link href="../lib/MOStyles/MOStyles.css" rel="stylesheet" type="text/css" />        
        <!--<script src="../js/jquery.js" type="text/javascript"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <link href="../lib/chosen/chosen.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="../lib/chosen/chosen.jquery.js" type="text/javascript"></script>
        <script src="../js/mp_admin.js" type="text/javascript"></script>
        <link href="../lib/shadowbox-3.0.3/shadowbox.css" rel="stylesheet" type="text/css" />
        <script src="../lib/shadowbox-3.0.3/shadowbox.js" type="text/javascript"></script>
        <link href="../lib/confirm/css/confirm.css" type="text/css" rel="stylesheet" />
        <script src="../lib/confirm/js/confirms.js" type="text/javascript"></script>
        <script src="../lib/confirm/js/jquery.simplemodal.js" type="text/javascript"></script>
        <script src="../lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
        <!--[if lte IE 7]><link href="../css/mp_admin_ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
    </head>
    <body>
        <div id="overlay"></div>
        <div id="container">
            <div id="header">
                <a href="./" class="logo"><img src="../img/mp-admin/logo.png" alt="Infinito Tech." /></a>
                <ul>
                    <li class="radius10"><a href="./" class="home">Inicio</a></li>
                    <li><a href="#" class="logout">Salir</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div id="body">
                <div id="nav"><?php include "nav.php"; ?></div>
                <div id="content"><?php include "directory.php"; ?></div>
            </div>
        </div>
        <div id="footer_admin">
            <div class="container">
                <div class="left">
                    Infinito Tech. &copy; Todos los derechos reservados 2015.
                </div>
                <div class="right">
                    <strong>Infinito Tech.</strong><br />
                    <strong>Tel&eacute;fono: </strong>+51 979765553<br />
                    <strong>Correo Electr&oacute;nico: </strong><a href="mailto:lbejarano@infinitodhd.com">lbejarano@infinitodhd.com</a>
                    </div>
            </div>
        </div>
        <div id="confirm" style="display: none;">
            <a href="#" title="Cerrar" class="modalCloseX modalClose">X</a>
            <div class="header"><span>Mensaje del Sistema...</span></div>
            <p class="message"></p>
            <div class="buttons">
                <div class="no modalClose">No</div><div class="yes">S&iacute;</div>
            </div>
        </div>
    </body>
</html>