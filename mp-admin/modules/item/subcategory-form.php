<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT CatID, SubCatNam, SubCatLnk FROM itech_subcategory WHERE SubCatID = '$id'");
    $row = $cn->fetch();
}else $row = array("CatID"=>"", "SubCatNam"=>"", "SubCatLnk"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informacio&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['SubCatNam']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="link" class="bold">Enlace</label></td>
                <td>: <input type="text" name="link" id="link" value="<?php echo mp_unscape($row['SubCatLnk']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="category" class="bold">Categor&iacute;a</label></td>
                <td>&nbsp; <select id="category" name="category" class="chosen"><?php
                $cn->query("SELECT CatID, CatNam FROM itech_category ORDER BY CatNam ASC");
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
    $(".chosen").chosen();
});
</script>