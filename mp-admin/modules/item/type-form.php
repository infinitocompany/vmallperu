<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT TypNam, TypAdd, TypAge, TypWeb, TypEma, TypPho FROM itech_type WHERE TypID = '$id'");
    $row = $cn->fetch();
}else $row = array("TypNam"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informacio&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="name" class="bold">Nombre</label></td>
                <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['TypNam']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="address" class="bold">Direcci&oacute;n</label></td>
                <td>: <input type="text" name="address" id="address" value="<?php echo mp_unscape($row['TypAdd']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="agent" class="bold">Nombre del Representante</label></td>
                <td>: <input type="text" name="agent" id="agent" value="<?php echo mp_unscape($row['TypAge']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="web" class="bold">P&aacute;gina Web</label></td>
                <td>: <input type="text" name="web" id="web" value="<?php echo mp_unscape($row['TypWeb']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="email" class="bold">Correo Electr&oacute;nico</label></td>
                <td>: <input type="text" name="email" id="email" value="<?php echo mp_unscape($row['TypEma']); ?>" /></td>
            </tr>
            <tr>
                <td><label for="phone" class="bold">Tel&eacute;fono</label></td>
                <td>: <input type="text" name="phone" id="phone" value="<?php echo mp_unscape($row['TypPho']); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
    </fieldset>
</form>