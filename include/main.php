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