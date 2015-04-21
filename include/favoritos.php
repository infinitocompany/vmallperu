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
        
        
            <table id="tabfavorites" class="table table-bordered table-hover">
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
            	$cn->query("select DISTINCT itg.GalID,itg.GalTit,itg.GalDatSta,itg.GalDatEnd,itt.TypNam
 from itech_favorite itf
	inner join itech_gallery itg on itf.GalId=itg.GalID
    inner join itech_type itt on itg.TypID=itt.TypID
where 
	UserId='".$_SESSION['vmall_iduser']."' 
    and StaFav='1'
	and itg.GalID in (select distinct GalId from itech_favorite where UserId='".$_SESSION['vmall_iduser']."' )");
            	$aGalIds="";
		        while($row = $cn->fetch()){
		        	echo '<tr>
            				<td>'.$row['GalTit'].'</td>
	            			<td>'.$row['GalDatSta'].'</td>
	            			<td>'.$row['GalDatEnd'].'</td>
	            			<td>'.$row['TypNam'].'</td>
							<td >
								<a href="index.php?page=mostrarproducto&notificacion=true&producto='.$row['GalID'].'">Ver mas</a> <a href="#" value="'.$row['GalID'].'" class="remove_favorite" > <span   style="font-size:x-large;color:#ff9c00;" class="icon-star"></span></a>
							</td>
            			</tr>';
		        }
		        ?>
		        
			</table>
        </div>
        <div  class="holder"></div>
        <!-- /Content -->