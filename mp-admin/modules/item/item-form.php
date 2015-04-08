<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT GalID, CouID, GalTit, GalPriCur, GalPriOff, GalPriDis, GalTexDis, GalImg, GalImg, GalImgA, GalImgB, GalImgC, GalImgD, GalImgE, TypID, GalMinDes, GalMaxDes, GalDatSta, GalDatEnd,GalFacLin FROM itech_gallery WHERE GalID = '$id'");
    $row = $cn->fetch();
}else $row = array("GalID"=>"", "CouID"=>"", "GalTit"=>"", "GalPriCur"=>"", "GalPriOff"=>"", "GalPriDis"=>"", "GalTexDis"=>"", "GalImg"=>"", "GalImgA"=>"", "GalImgB"=>"", "GalImgC"=>"", "GalImgD"=>"", "GalImgE"=>"", "GalTypID"=>"", "GalMinDes"=>"", "GalMaxDes"=>"", "GalDatSta"=>"", "GalDatEnd"=>"","GalFacLin"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="group" class="bold">Anunciante</label></td>
                <td style="padding:0 0 4px 2px;">&nbsp; <select id="group" name="group"><option>Seleccione una opción...</option><?php
                $cn->query("SELECT TypID, TypNam FROM itech_type ORDER BY TypNam ASC");
                while($rw = $cn->fetch()) echo "<option value=\"$rw[0]\"".($rw[0] == $row['TypID'] ? ' selected="selected"' : '').">$rw[1]</option>";
                ?></select></td>
            </tr>
            <tr>
                <td><label for="country" class="bold">Nacionalidad</label></td>
                <td style="padding:0 0 4px 2px;">&nbsp; <select id="country" name="country"><option>Seleccione una opción...</option><?php
                $cn->query("SELECT CouID, CouDes FROM itech_country ORDER BY CouDes ASC");
                while($rw = $cn->fetch()) echo "<option value=\"$rw[0]\"".($rw[0] == $row['CouID'] ? ' selected="selected"' : '').">$rw[1]</option>";
                ?></select></td>
            </tr>
            <tr>
                <td><label for="category" class="bold">Categor&iacute;as</label></td>
                <td style="padding:0 0 4px 2px;">&nbsp; <select id="category" name="category[]" class="chose" multiple="true"><?php
                if($row['GalID']!=''){
                    $cn->query("SELECT SubCatID, SubCatNam FROM itech_subcategory ORDER BY SubCatNam ASC");
                    while($rw = $cn->fetch()) 
                    {	
                        $cn->qry("SELECT COUNT(id) AS cnt FROM itech_gallery_subcategory WHERE SubCatID='".$rw[0]."' AND GalID='".$row['GalID']."'");
                        $slc=$cn->rst('cnt');
                        echo "<option value=\"$rw[0]\"".($slc == 1 ? ' selected="selected"' : '').">$rw[1]</option>";
                    }
                }
                else{
                    $cn->query("SELECT SubCatID, SubCatNam FROM itech_subcategory ORDER BY SubCatNam ASC");
                    while($rw = $cn->fetch()) echo "<option value=\"$rw[0]\">$rw[1]</option>";
                }
                ?></select></td>
            </tr>
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['GalTit']); ?>" /></td>
            </tr>
             <tr>
                <td><label for="name" class="bold">Facebook Link</label></td>
                <td>: <input type="text" name="faclin" id="faclin" value="<?php echo mp_unscape($row['GalFacLin']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="start" class="bold">Inicio Activaci&oacute;n</label></td>
                <td>: <input type="text" name="start" id="start" value="<?php echo $row['GalDatSta']; ?>" /></td>
            </tr>
            <tr>
                <td><label for="end" class="bold">Fin Activaci&oacute;n</label></td>
                <td>: <input type="text" name="end" id="end" value="<?php echo $row['GalDatEnd']; ?>" /></td>
            </tr>
            <tr>
                <td><label for="price" class="bold">Precio Inicial</label></td>
                <td>: <input type="text" name="price" id="price" value="<?php echo mp_unscape($row['GalPriCur']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="priceoff" class="bold">Precio Oferta</label></td>
                <td>: <input type="text" name="priceoff" id="priceoff" value="<?php echo mp_unscape($row['GalPriOff']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="pricedis" class="bold">Precio Descuento</label></td>
                <td>: <input type="text" name="pricedis" id="pricedis" value="<?php echo mp_unscape($row['GalPriDis']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="discount" class="bold">Texto Descuento</label></td>
                <td>: <input type="text" name="discount" id="discount" value="<?php echo mp_unscape($row['GalTexDis']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="file" class="bold">Imagen Principal<br /><small class="red">(max 1200w x 1200h)</small></label></td>
                <td>&nbsp; <input type="file" id="file" /></td>
            </tr>
            <tr>
                <td><label for="imagena" class="bold">Imagen 1<br /><small class="red">(max 1200w x 1200h)</small></label></td>
                <td>&nbsp; <input type="file" id="imagena" /></td>
            </tr>
            <tr>
                <td><label for="imagenb" class="bold">Imagen 2<br /><small class="red">(max 1200w x 1200h)</small></label></td>
                <td>&nbsp; <input type="file" id="imagenb" /></td>
            </tr>
            <tr>
                <td><label for="imagenc" class="bold">Imagen 3<br /><small class="red">(max 1200w x 1200h)</small></label></td>
                <td>&nbsp; <input type="file" id="imagenc" /></td>
            </tr>
            <tr>
                <td><label for="imagend" class="bold">Imagen 4<br /><small class="red">(max 1200w x 1200h)</small></label></td>
                <td>&nbsp; <input type="file" id="imagend" /></td>
            </tr>
            <tr>
                <td><label for="imagene" class="bold">Imagen 5<br /><small class="red">(max 1200w x 1200h)</small></label></td>
                <td>&nbsp; <input type="file" id="imagene" /></td>
            </tr>
            <tr>
                <td><label for="description" class="bold">Descripci&oacute;n</label></td>
                <td><textarea name="description" id="description" cols="2" rows="4"><?php echo $row['GalMinDes']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="content" class="bold">Contenido</label></td>
                <td><textarea name="content" id="tinymce" class="tinymce"><?php echo $row['GalMaxDes']; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
    </fieldset>
</form>
<script type="text/javascript">
$(document).ready(function(){
	mp_tinymce();
        $("#start, #end").datepicker({ dateFormat: 'dd/mm/yy' });
	$("#group").chosen();$("#country").chosen();
	$("#category").data("placeholder","Seleccione una categoría...").chosen();
	$("#file").makeAsyncUploader({
            upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
            flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
            path_url: '../userfiles/', 
            disableDuringUpload: 'input[type="submit"]', 
            <?php if(!empty($id)){ ?>
            existingFilename: '<?php echo substr(strstr($row['GalImg'], "_"), 1); ?>', 
            existingGuid: '<?php echo $row['GalImg']; ?>', 
            existingFileSize: <?php echo filesize("../userfiles/".$row['GalImg']); ?>, 
            <?php } ?>
            file_types_description: 'Image or Video', 
            file_types: '*.jpg; *.gif; *.png; *.flv;', 
            file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
            button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
        $("#imagena").makeAsyncUploader({
            upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
            flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
            path_url: '../userfiles/', 
            disableDuringUpload: 'input[type="submit"]', 
            <?php if(!empty($id)){ ?>
            existingFilename: '<?php echo substr(strstr($row['GalImgA'], "_"), 1); ?>', 
            existingGuid: '<?php echo $row['GalImgA']; ?>', 
            existingFileSize: <?php echo filesize("../userfiles/".$row['GalImgA']); ?>, 
            <?php } ?>
            file_types_description: 'Image or Video', 
            file_types: '*.jpg; *.gif; *.png; *.flv;', 
            file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
            button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
        $("#imagenb").makeAsyncUploader({
            upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
            flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
            path_url: '../userfiles/', 
            disableDuringUpload: 'input[type="submit"]', 
            <?php if(!empty($id)){ ?>
            existingFilename: '<?php echo substr(strstr($row['GalImgB'], "_"), 1); ?>', 
            existingGuid: '<?php echo $row['GalImgB']; ?>', 
            existingFileSize: <?php echo filesize("../userfiles/".$row['GalImgB']); ?>, 
            <?php } ?>
            file_types_description: 'Image or Video', 
            file_types: '*.jpg; *.gif; *.png; *.flv;', 
            file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
            button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
        $("#imagenc").makeAsyncUploader({
            upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
            flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
            path_url: '../userfiles/', 
            disableDuringUpload: 'input[type="submit"]', 
            <?php if(!empty($id)){ ?>
            existingFilename: '<?php echo substr(strstr($row['GalImgC'], "_"), 1); ?>', 
            existingGuid: '<?php echo $row['GalImgC']; ?>', 
            existingFileSize: <?php echo filesize("../userfiles/".$row['GalImgC']); ?>, 
            <?php } ?>
            file_types_description: 'Image or Video', 
            file_types: '*.jpg; *.gif; *.png; *.flv;', 
            file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
            button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
        $("#imagend").makeAsyncUploader({
            upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
            flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
            path_url: '../userfiles/', 
            disableDuringUpload: 'input[type="submit"]', 
            <?php if(!empty($id)){ ?>
            existingFilename: '<?php echo substr(strstr($row['GalImgD'], "_"), 1); ?>', 
            existingGuid: '<?php echo $row['GalImgD']; ?>', 
            existingFileSize: <?php echo filesize("../userfiles/".$row['GalImgD']); ?>, 
            <?php } ?>
            file_types_description: 'Image or Video', 
            file_types: '*.jpg; *.gif; *.png; *.flv;', 
            file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
            button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
        $("#imagene").makeAsyncUploader({
            upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
            flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
            path_url: '../userfiles/', 
            disableDuringUpload: 'input[type="submit"]', 
            <?php if(!empty($id)){ ?>
            existingFilename: '<?php echo substr(strstr($row['GalImgE'], "_"), 1); ?>', 
            existingGuid: '<?php echo $row['GalImgE']; ?>', 
            existingFileSize: <?php echo filesize("../userfiles/".$row['GalImgE']); ?>, 
            <?php } ?>
            file_types_description: 'Image or Video', 
            file_types: '*.jpg; *.gif; *.png; *.flv;', 
            file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
            button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
});
</script>