<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT MenID, SubMenNam, SubMenLnk FROM itech_submenu WHERE SubMenID = '$id'");
    $row = $cn->fetch();
}else $row = array("SubMenNam"=>"", "SubMenLnk"=>"", "MenID"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informacio&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['SubMenNam']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="link" class="bold">Enlace</label></td>
                <td>: <input type="text" name="link" id="link" value="<?php echo mp_unscape($row['SubMenLnk']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="menu" class="bold">Men&uacute;</label></td>
                <td>&nbsp; <select id="menu" name="menu" class="chosen"><?php
                $cn->query("SELECT MenID, MenNam FROM itech_menu ORDER BY MenNam ASC");
                while($rw = $cn->fetch()) echo "<option value=\"$rw[0]\"".($rw[0] == $row['MenID'] ? ' selected="selected"' : '').">$rw[1]</option>";
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