<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT BanNam, BanAlt, BanImg, CatID FROM itech_banner WHERE BanID = '$id'");
    $row = $cn->fetch();
}else $row = array("BanNam"=>"", "BanAlt"=>"", "BanImg"=>"", "CatID"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['BanNam']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="alt" class="bold">Atributo Alt</label></td>
                <td>: <input type="text" name="alt" id="alt" value="<?php echo mp_unscape($row['BanAlt']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="file" class="bold">Imagen<br /><small class="red">(160w x 80h)</small></label></td>
                <td>&nbsp; <input type="file" id="file" /></td>
            </tr>
            <tr>
                <td><label for="category" class="bold">Categor&iacute;a</label></td>
                <td>&nbsp; <select id="category" name="category" class="chosen"><?php
                $cn->query("SELECT CatID, CatNam FROM itech_category ORDER BY CatNam DESC");
                while($rw = $cn->fetch()) echo "<option value=\"$rw[0]\"".($rw[0] == $row['CatID'] ? ' selected="selected"' : '').">$rw[1]</option>";
                ?></select></td>
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
    $("#file").makeAsyncUploader({
        upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
        flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
        path_url: '../userfiles/', 
        disableDuringUpload: 'input[type="submit"]', 
        <?php if(!empty($id)){ ?>
        existingFilename: '<?php echo substr(strstr($row['BanImg'], "_"), 1); ?>', 
        existingGuid: '<?php echo $row['BanImg']; ?>', 
        existingFileSize: <?php echo filesize("../userfiles/".$row['BanImg']); ?>, 
        <?php } ?>
        file_types_description: 'Image or Video', 
        file_types: '*.jpg; *.gif; *.png; *.flv;', 
        file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
        button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
    });
    $(".chosen").chosen();
});
</script>