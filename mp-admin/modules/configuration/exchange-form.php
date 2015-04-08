<?php
require_once "../conf.php";
$fecha = date("Y-m-d");
$cn->query("SELECT ExcRatUSD FROM itech_exchange_rate ORDER BY ExcID DESC LIMIT 1");
?>
<form>
    <fieldset>
        <legend>Actualizar Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="exchange">Tipo de Cambio</label></td>
                <td>: <input type="text" name="exchange" id="exchange" value="<?php echo $cn->result('ExcRatUSD'); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
    </fieldset>
</form>
<script type="text/javascript">
$(document).ready(function(){
    $("#exchange").mask("9.99");
});
</script>