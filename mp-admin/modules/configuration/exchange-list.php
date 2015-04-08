<?php
require_once "../conf.php";
$fecha = date("Y-m-d");
$cn->query("SELECT ExcRatUSD FROM itech_exchange_rate WHERE ExcDat='".$fecha."'");
?>
<br />
<fieldset>
    <legend>Informaci&oacute;n</legend>
    <table width="100%">
        <tr>
            <td><label for="exchange" class="bold">Tipo de Cambio para el <?php echo date("Y-m-d");?></label></td>
            <td>: <?php echo $cn->result('ExcRatUSD') != "" ? $cn->result('ExcRatUSD') : '<span class="gray">A&uacute;n no se ha ingresado el tipo del cambio del d&iacute;a.</span>'; ?><br /><small class="lightblue">Si el tipo de cambio no ha sido ingresado, el &uacute;ltimo tipo de cambio ingresado quedar&aacute; como activo.</small></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="Editar" class="update" /></td>
        </tr>
    </table>
</fieldset>