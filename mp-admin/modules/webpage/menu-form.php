<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT MenNam, MenLnk FROM itech_menu WHERE MenID = '$id'");
    $row = $cn->fetch();
}else $row = array("MenNam"=>"", "MenLnk"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informacio&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['MenNam']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="link" class="bold">Enlace</label></td>
                <td>: <input type="text" name="link" id="link" value="<?php echo mp_unscape($row['MenLnk']); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
    </fieldset>
</form>