<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
    $cn->query("SELECT name, lastname, user, phone, movil FROM vmall_users WHERE id = '$id'");
    $row = $cn->fetch();
}else $row = array("name"=>"", "lastname"=>"", "user"=>"", "phone"=>"", "movil"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
    <fieldset>
        <legend>Ingresar Informaci&oacute;n</legend>
        <table width="100%">
        <tr>
            <td><label for="user" class="bold">Usuario</label></td>
            <td>: <input type="text" name="user" id="user" value="<?php echo mp_unscape($row['user']); ?>" /></td>
        </tr>
        <tr>
            <td><label for="name" class="bold">Nombre(s)</label></td>
            <td>: <input type="text" name="name" id="name" value="<?php echo mp_unscape($row['name']); ?>" /></td>
        </tr>
        <tr>
            <td><label for="lastname" class="bold">Apellido(s)</label></td>
            <td>: <input type="text" name="lastname" id="lastname" value="<?php echo mp_unscape($row['lastname']); ?>" /></td>
        </tr>
        <tr>
            <td><label for="phone" class="bold">Tel&eacute;fono de Casa</label></td>
            <td>: <input type="text" name="phone" id="phone" value="<?php echo mp_unscape($row['phone']); ?>" /><br />
                <small class="lightblue">(00x) xXX-XXXX [0=Cód. País, x=Cód. Ciudad, X=Nro. Tel&eacute;fono]</small>               
            </td>
        </tr>
        <tr>
            <td><label for="movil" class="bold">Tel&eacute;fono M&oacute;vil</label></td>
            <td>: <input type="text" name="movil" id="movil" value="<?php echo mp_unscape($row['movil']); ?>" /><br />
                <small class="lightblue">(00X) XXXX-XXXX [0=Cód. País, X=Nro. Tel&eacute;fono]</small>
            </td>
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
    $("#phone").mask("(999) 999-9999");
    $("#movil").mask("(999) 9999-9999");
});
</script>