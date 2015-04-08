<?php
require_once "../conf.php";
$cn->query("SELECT UseDes, UseUse, UsePas, UseEma FROM itech_user");
?>
<form>
    <fieldset>
        <legend>Actualizar Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label class="bold" for="description">Descripci&oacute;n</label></td>
                <td>: <input type="text" name="description" id="description" value="<?php echo $cn->result('UseDes'); ?>" /></td>
            </tr>
            <tr>
                <td><label class="bold" for="username">Usuario</label></td>
                <td>: <input type="text" name="username" id="username" value="<?php echo $cn->result('UseUse'); ?>" /></td>
            </tr>
            <tr>
                <td><label class="bold" for="password">Contrase&ntilde;a Nueva</label></td>
                <td>: <input type="password" name="pass" id="pass" value="" /></td>
            </tr>
            <tr>
                <td><label class="bold" for="password">Repita la Contrase&ntilde;a</label></td>
                <td>: <input type="password" name="passw" id="passw" value="" /></td>
            </tr>
            <tr>
                <td><label class="bold" for="email">Correo Electr&oacute;nico</label></td>
                <td>: <input type="text" name="email" id="email" value="<?php echo $cn->result('UseEma'); ?>" /><br /><small class="lightblue">El correo servira para reenviar su contrase&ntilde;a en caso no recuerde la misma.<br />Si usted usa el dominio de su empresa, habilite el dominio de "aquolity.com" como correo seguro.</small></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
    </fieldset>
</form>