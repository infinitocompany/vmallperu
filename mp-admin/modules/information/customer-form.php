<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT CliNam, CliPho FROM clients WHERE CliID = '$id'");
    $row = $cn->fetch();
}else $row = array("CliNam"=>"", "CliPho"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
	<fieldset>
		<legend>Ingresar Informacio&oacute;n</legend>
		<table width="100%">
			<tr>
				<td><label for="name">Nombre</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo mp_unscape($row['CliNam']); ?>" /></td>
			</tr>
			<tr>
				<td><label for="file">Imagen<br /><small class="red">(160w x 80h)</small></label></td>
				<td><input type="file" id="file" /></td>
			</tr>
			<tr>
				<td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
	</fieldset>
</form>
<script src="../lib/jquery-asyncUpload-0.1/swfupload.js" type="text/javascript"></script>
<script src="../lib/jquery-asyncUpload-0.1/jquery-asyncUpload-0.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#file").makeAsyncUploader({
		upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
		flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
		path_url: '../userfiles/', 
		disableDuringUpload: 'input[type="submit"]', 
		<?php if(!empty($id)){ ?>
		existingFilename: '<?php echo substr(strstr($row['CliPho'], "_"), 1); ?>', 
		existingGuid: '<?php echo $row['CliPho']; ?>', 
		existingFileSize: <?php echo filesize("../userfiles/".$row['CliPho']); ?>, 
		<?php } ?>
		file_types_description: 'Image or Video', 
		file_types: '*.jpg; *.gif; *.png; *.flv;', 
		file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
		button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
});
</script>