<!-- Content -->
    <div class="canvas-content">
    <div class="row content" style="text-align: center; color: #DE3A1F;">
    	
        <span class="icon-cog" style="font-size:500%">
        </span>
        
        
    </div>
    <div class="row content" style="text-align: center;">
    <h1 style="color: #DE3A1F;">
    Notificaciones
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
            	$cn->query("select ig.GalID,ig.GalTit,ig.GalDatSta,ig.GalDatEnd,it.TypNam
from itech_gallery ig
	inner join itech_type it on ig.TypID=it.TypID
where ig.GalID in (
select GalID from (
select ig.GalID
	from itech_gallery ig
		inner join itech_gallery_subcategory igs on ig.GalID=igs.GalID
	where ig.GalSta='1'
		and DATE_FORMAT(now(), '%Y-%m-%d')<=ig.GalDatEnd
		and ig.GalId in	(
							select DISTINCT vn.GalId
								from vmall_notifications vn
								where vn.UseId='".$_SESSION['vmall_iduser']."' and DATE_FORMAT(now(), '%Y-%m-%d')  between vn.NotDatBeg and vn.NotDatEnd 
										and vn.NotTip='1'
						)
union 
select ig.GalID 
	from itech_gallery ig
		inner join itech_gallery_subcategory igs on ig.GalID=igs.GalID
	where ig.GalSta='1'
		and DATE_FORMAT(now(), '%Y-%m-%d')<=ig.GalDatEnd
		and ig.TypID in	(
			select distinct ig.TypId
				from vmall_notifications vn 
					inner join itech_gallery as ig on ig.GalId=vn.GalId
				where vn.UseId='".$_SESSION['vmall_iduser']."' and DATE_FORMAT(now(), '%Y-%m-%d')  between vn.NotDatBeg and vn.NotDatEnd 
					and vn.NotTip='2'
					
						)
union 
select ig.GalID
	from itech_gallery ig
		inner join itech_gallery_subcategory igs on ig.GalID=igs.GalID
	where ig.GalSta='1'
		and DATE_FORMAT(now(), '%Y-%m-%d')<=ig.GalDatEnd
		and igs.SubCatID in	(
								select distinct SubCatID 
								from vmall_notifications vn 
									inner join itech_gallery_subcategory igs on igs.GalID=vn.GalId
								where vn.UseId='".$_SESSION['vmall_iduser']."' and DATE_FORMAT(now(), '%Y-%m-%d')  between vn.NotDatBeg and vn.NotDatEnd 
									and vn.NotTip='3'
									)
                                    ) as uno
where GalID not in (select GalID from notifications_gallery where UseId='".$_SESSION['vmall_iduser']."')
)
order by 1 desc");
            	$aGalIds="";
		        while($row = $cn->fetch()){
		        	echo '<tr>
            				<td>'.$row['GalTit'].'</td>
	            			<td>'.$row['GalDatSta'].'</td>
	            			<td>'.$row['GalDatEnd'].'</td>
	            			<td>'.$row['TypNam'].'</td>
							<td >
									<a href="index.php?page=mostrarproducto&notificacion=true&producto='.$row['GalID'].'">Ver mas</a> <span data-product-id="'.$row['GalID'].'" data-user-id="'.$_SESSION['vmall_iduser'].'" style="font-size:x-large;color:#cccccc;"  class="send_favorites_not icon-star-outlined"></span>
							</td>
            			</tr>';
		        }
		        ?>
		        
			</table>
        </div>
        <div  class="holder"></div>
        <!-- /Content -->