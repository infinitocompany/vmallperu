<?php
require_once "../conf.php";
$cn->query("SELECT ConLog, ConSlo, ConFavIco, ConMas FROM itech_configuration");
?>
<form>
    <fieldset>
        <legend>Actualizar Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label class="bold" for="favicon">Favicon<br /><small class="red">(16w x 16h)</small></label></td>
                <td>: <input type="file" id="favicon" /></td>
            </tr>
            <tr>
                <td><label class="bold" for="logo">Logo<br /><small class="red">(307w x 103h)</small></label></td>
                <td>: <input type="file" id="logo" /></td>
            </tr>
            <tr>
                <td><label class="bold" for="mascot">Mascota Virtual<br /><small class="red">(268w x 153h)</small></label></td>
                <td>: <input type="file" id="mascot" /></td>
            </tr>
            <tr>
                <td><label class="bold" for="slogan">Slogan</label></td>
                <td>: <input type="text" name="slogan" id="slogan" value="<?php echo $cn->result('ConSlo'); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
    </fieldset>
</form>
<script src="../lib/jquery-asyncUpload-0.1/swfupload.js" type="text/javascript"></script>
<script src="../lib/jquery-asyncUpload-0.1/jquery-asyncUpload-0.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#logo").makeAsyncUploader({
        upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
        flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
        path_url: '../userfiles/', 
        disableDuringUpload: 'input[type="submit"]', 
        existingFilename: '<?php echo substr(strstr($cn->result('ConLog'), "_"), 1); ?>', 
        existingGuid: '<?php echo $cn->result('ConLog'); ?>', 
        existingFileSize: <?php echo filesize("../userfiles/".$cn->result('ConLog')); ?>, 
        file_types_description: 'All Image', 
        file_types: '*.jpg; *.gif; *.png;', 
        file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
        button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
    });
    
    $("#favicon").makeAsyncUploader({
        upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
        flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
        path_url: '../userfiles/', 
        disableDuringUpload: 'input[type="submit"]', 
        existingFilename: '<?php echo substr(strstr($cn->result('ConFavIco'), "_"), 1); ?>', 
        existingGuid: '<?php echo $cn->result('ConFavIco'); ?>', 
        existingFileSize: <?php echo filesize("../userfiles/".$cn->result('ConFavIco')); ?>, 
        file_types_description: 'Icon', 
        file_types: '*.ico;', 
        file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
        button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
    });
    
    $("#mascot").makeAsyncUploader({
        upload_url: "<?php echo $_SERVER['PHP_SELF']; ?>?mod=1", 
        flash_url: '../lib/jquery-asyncUpload-0.1/swfupload.swf', 
        path_url: '../userfiles/', 
        disableDuringUpload: 'input[type="submit"]', 
        existingFilename: '<?php echo substr(strstr($cn->result('ConMas'), "_"), 1); ?>', 
        existingGuid: '<?php echo $cn->result('ConMas'); ?>', 
        existingFileSize: <?php echo filesize("../userfiles/".$cn->result('ConMas')); ?>, 
        file_types_description: 'Gif Image', 
        file_types: '*.gif;', 
        file_size_limit: '<?php echo ini_get("upload_max_filesize"); ?>B', 
        button_image_url: '../lib/jquery-asyncUpload-0.1/blankButton.png'
    });
});
</script>