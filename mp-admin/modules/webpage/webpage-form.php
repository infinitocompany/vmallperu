<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT WebPagNam, WebPagCon, WebPagTit, WebPagDes, WebPagKey FROM itech_web_page WHERE WebPagID = '$id'");
    $row = $cn->fetch();
}else $row = array("WebPagNam"=>"", "WebPagCon"=>"", "WebPagTit"=>"", "WebPagDes"=>"", "WebPagKey"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>  
        <legend>Ingrese Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['WebPagNam']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="title" class="bold">Meta Title</label></td>
                <td>: <input type="text" name="title" id="title" value="<?php echo mp_unscape($row['WebPagTit']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="description" class="bold">Meta Description</label></td>
                <td>: <input type="text" name="description" id="description" value="<?php echo mp_unscape($row['WebPagDes']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="keywords" class="bold">Meta Keywords</label></td>
                <td>: <input type="text" name="keywords" id="keywords" value="<?php echo mp_unscape($row['WebPagKey']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="content" class="bold">Contenido</label></td>
                <td><textarea name="content" id="tinymce" class="tinymce"><?php echo $row['WebPagCon']; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
    </fieldset>
</form>
<script type="text/javascript">
$(document).ready(function(){
    mp_tinymce();
});
</script>