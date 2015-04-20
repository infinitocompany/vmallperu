<!-- Content -->
    <div class="canvas-content">
    <div class="row content" style="text-align: center; color: #DE3A1F;">
    	
        <span class="icon-star-outlined" style="font-size:500%">
        </span>
        
        
    </div>
    <div class="row content" style="text-align: center;">
    <h1 style="color: #DE3A1F;">
    Favoritos
    </h1>
    
    </div>
        <div class="row content">
        
        
            <table class="table table-bordered table-hover">
            	<tr>
            		<th style="width: 30%">Oferta</th>
            		<th style="width: 10%">Fecha publicaci&oacute;n</th>
            		<th style="width: 10%">Vigencia</th>
            		<th style="width: 30%">Ofertante</th>
            		<th style="width: 20%">Opciones</th>
            	</tr>
            	<?php 
            	if(isset($_SESSION['vmall_iduser']))
            	{
            		echo '<input type="text" id="editUser" value="'.$_SESSION['vmall_iduser'].'" class="hide"/>';
            	}
            	else {
            		echo '<input type="text" id="editUser" value="" class="hide"/>';
            	}
            	$cn->query("select ig.GalID,ig.GalTit,ig.GalDatSta,ig.GalDatEnd,it.TypNam
from itech_gallery ig
	inner join itech_type it on ig.TypID=it.TypID
where  ig.GalID in (select distinct GalId from itech_favorite where StaFav='1' and UserId='".$_SESSION['vmall_iduser']."')
order by 1 desc");
            	$aGalIds="";
		        while($row = $cn->fetch()){
		        	echo '<tr>
            				<td>'.$row['GalTit'].'</td>
	            			<td>'.$row['GalDatSta'].'</td>
	            			<td>'.$row['GalDatEnd'].'</td>
	            			<td>'.$row['TypNam'].'</td>
							<td >
								<a href="index.php?page=mostrarproducto&notificacion=true&producto='.$row['GalID'].'">Ver mas</a> <span id="remove_favorite" value="'.$row['GalID'].'" style="font-size:x-large;color:#ff9c00;" class="icon-star"></span>
							</td>
            			</tr>';
		        }
		        ?>
		        
			</table>
        </div>
        <div  class="holder"></div>
        <!-- /Content -->