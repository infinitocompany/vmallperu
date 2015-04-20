<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8">
        <title>VirtualMall | Solicitudes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-submenu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-menu-core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-main.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-form.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style-pages.css"rel="stylesheet" type="text/css">
        <link href="lib/chosen/chosen.css"rel="stylesheet" type="text/css">
        <link href="lib/jPages/jPages.css"rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php include("include/header.php"); ?>
    <?php include("include/menu.php"); ?>
    <!-- Content -->
    <div class="canvas-content">
        <div class="row content">
            <table>
                <thead>
                    <tr>
                        <th>Oferta</th>
                        <th>Descripción</th>
                        <th>Title</th>
                        <th>Votes</th>
                        <th>Desactivar</th>
                    </tr>
                </thead>
                <tbody id="itemTable">
                    <tr>
                        <td>1.</td>
                        <td>9.2</td>
                        <td>The Shawshank Redemption (1994)</td>
                        <td>699,295</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>9.2</td>
                        <td>The Godfather (1972)</td>
                        <td>524,507</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>9.0</td>
                        <td>The Godfather: Part II (1974)</td>
                        <td>329,051</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>8.9</td>
                        <td>Il buono, il brutto, il cattivo. (1966)</td>
                        <td>219,022</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>8.9</td>
                        <td>Pulp Fiction (1994)</td>
                        <td>549,166</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>8.9</td>
                        <td>12 Angry Men (1957)</td>
                        <td>170,234</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>8.9</td>
                        <td>Schindler's List (1993)</td>
                        <td>366,494</td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>8.8</td>
                        <td>The Dark Knight (2008)</td>
                        <td>634,065</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="holder"></div>
        <!-- /Content -->
    </section>
    <?php include("include/modal.php");?>
    <?php include("include/detail.php");?>
    <?php include("include/footer.php"); ?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/crud_ajax.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.datepick.js"></script>
    <script type="text/javascript" src="assets/js/jquery.custom-main.js"></script>
    <script type="text/javascript" src="lib/chosen/chosen.jquery.js"></script>
    <script type="text/javascript" src="lib/jPages/jPages.js"></script>
    <script>
        $("#searchType").chosen();
        $(function() {
            $("div.holder").jPages({
                containerID: "itemTable",
                previous : "«",
                next : "»",
                perPage:10,
                midRange: 5,
                direction: "random",
                animation: "flipInY"
            });
        });
    </script>
</html>
