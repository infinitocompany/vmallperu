<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
	$cn->query("SELECT name, file, thumbnail, detail, content, date FROM mp_news WHERE id = '$id'");
	$row = $cn->fetch();
}else $row = array("name"=>"", "file"=>"", "thumbnail"=>"", "detail"=>"", "content"=>"", "date"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
	<fieldset>
		<legend>Enter Information</legend>
		<table width="100%">
			<tr>
				<td><label for="name">Name</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo mp_unscape($row['name']); ?>" /></td>
			</tr>
			<tr>
				<td><label for="file">Image<br /><small class="red">(160w x 80h)</small></label></td>
				<td><input type="file" id="file" /></td>
			</tr>
			<tr>
				<td><label for="thumbnail">Image Hover<br /><small class="red">(160w x 80h)</small></label></td>
				<td><input type="file" id="thumbnail" /></td>
			</tr>
			<tr>
				<td><label for="detail">Detail</label></td>
				<td><textarea name="detail" id="detail"><?php echo $row['detail']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="tinymce">Content</label></td>
				<td><textarea name="content" id="tinymce" class="tinymce"><?php echo $row['content']; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><br /><input type="submit" value="Submit" /> <input type="button" value="Cancel" class="list" /></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
	</fieldset>
</form>
<script src="../lib/jquery-asyncUpload-0.1/swfupload.js" type="text/javascript"></script>
<script src="../lib/jquery-asyncUpload-0.1/jquery-asyncUpload-0.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	mp_tinymce();
	
	$("#file").makeAsyncUploader({
		upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
		flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
		path_url: '../userfiles/', 
		disableDuringUpload: 'input[type="submit"]', 
		<?php if(!empty($id)){ ?>
		existingFilename: '<?php echo substr(strstr($row['file'], "_"), 1); ?>', 
		existingGuid: '<?php echo $row['file']; ?>', 
		existingFileSize: <?php echo filesize("../userfiles/".$row['file']); ?>, 
		<?php } ?>
		file_types_description: 'Image or Video', 
		file_types: '*.jpg; *.gif; *.png; *.flv;', 
		file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
		button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
	
	$("#thumbnail").makeAsyncUploader({
		upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
		flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
		path_url: '../userfiles/', 
		disableDuringUpload: 'input[type="submit"]', 
		<?php if(!empty($id)){ ?>
		existingFilename: '<?php echo substr(strstr($row['thumbnail'], "_"), 1); ?>', 
		existingGuid: '<?php echo $row['thumbnail']; ?>', 
		existingFileSize: <?php echo filesize("../userfiles/".$row['thumbnail']); ?>, 
		<?php } ?>
		file_types_description: 'All Images', 
		file_types: '*.jpg; *.gif; *.png;', 
		file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
		button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
	});
});
</script>