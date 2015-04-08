<?php
require_once "../conf.php";
$cn->query("SELECT UseDes, UseUse, UsePas, UseEma FROM itech_user");
?>
<br />
<fieldset>
    <legend>Informaci&oacute;n</legend>
    <table width="100%">
        <tr>
            <td><label class="bold" for="description">Descripci&oacute;n</label></td>
            <td>: <?php echo $cn->result('UseDes'); ?></td>
        </tr>
        <tr>
            <td><label class="bold" for="username">Nombre de Usuario</label></td>
            <td>: <?php echo $cn->result('UseUse'); ?></td>
        </tr>
        <tr>
            <td><label class="bold" for="password">Contrase&ntilde;a</label></td>
            <td>: <?php echo $cn->result('UsePas'); ?></td>
        </tr>
        <tr>
            <td><label class="bold" for="email">Correo Electr&oacute;nico</label></td>
            <td>: <?php echo $cn->result('UseEma'); ?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="Editar" class="update" /></td>
        </tr>
    </table>
</fieldset>