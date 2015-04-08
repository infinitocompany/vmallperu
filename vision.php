<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8">
        <title>VirtualMall | Visión</title>
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
    </head>
    <body>
    <?php include("include/header.php"); ?>
    <?php include("include/menu.php"); ?>
    <!-- Content -->
    <div class="canvas-content">
        <div class="row content">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="row">
                    <div class="box-item-bag no-paddingH"><img class="img-responsive " src="assets/img/canvas-content/bag.jpg" /></div>  
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 ">
                <div class="box-item-right">
                <?php $cn->query("SELECT WebPagID, WebPagNam, WebPagCon FROM itech_web_page WHERE WebPagLnk='vision'");?>
                    <h2><?php echo $cn->result('WebPagNam'); ?></h2>
                    <div class="col-xs-12 col-sm-12 col-md-12 "><?php echo $cn->result('WebPagCon'); ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
    </section>
    <?php include("include/modal.php");?>
    <?php include("include/footer.php");?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/crud_ajax.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.datepick.js"></script>
    <script type="text/javascript" src="assets/js/jquery.custom-main.js"></script>
</html>
