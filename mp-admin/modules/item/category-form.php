<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT SubMenID, CatNam, CatDes FROM itech_category WHERE CatID = '$id'");
    $row = $cn->fetch();
}else $row = array("SubMenID"=>"", "CatNam"=>"", "CatDes"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informacio&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['CatNam']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="description" class="bold">Descripci&oacute;n</label></td>
                <td>: <input type="text" name="description" id="description" value="<?php echo mp_unscape($row['CatDes']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="smenu" class="bold">SubMen&uacute;</label></td>
                <td>&nbsp; <select id="smenu" name="smenu" class="chosen"><?php
                $cn->query("SELECT SubMenID, SubMenNam FROM itech_submenu ORDER BY SubMenNam ASC");
                while($rw = $cn->fetch()) echo "<option value=\"$rw[0]\"".($rw[0] == $row['SubMenID'] ? ' selected="selected"' : '').">$rw[1]</option>";
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