<?php
require_once "../conf.php";
$cn->query("SELECT ConEma, ConSch, ConAdd, ConCit, ConSta, ConZip, ConCou, ConPho, ConFax, ConMap, ConGooMap FROM itech_configuration");
?>
<form>
    <fieldset>
        <legend>Actualizar Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label class="bold" for="email">Correo Electr&oacute;nico</label></td>
                <td>: <input type="text" name="email" id="email" value="<?php echo $cn->result('ConEma'); ?>" /><br /><small class="lightblue">El correo servira para recibir los mail del formulario de cont&aacute;ctanos.<br />Si usted usa el dominio de su empresa, habilite el dominio de "aquolity.com" como correo seguro.</small></td>
            </tr>
            <tr>
                <td><label for="schedule" class="bold">Horario</label></td>
                <td>: <input type="text" name="schedule" id="schedule" value="<?php echo $cn->result('ConSch'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="address" class="bold">Direcci&oacute;n</label></td>
                <td>: <input type="text" name="address" id="address" value="<?php echo $cn->result('ConAdd'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="city" class="bold">Ciudad</label></td>
                <td>: <input type="text" name="city" id="city" value="<?php echo $cn->result('ConCit'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="state" class="bold">Estado</label></td>
                <td>: <input type="text" name="state" id="state" value="<?php echo $cn->result('ConSta'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="zip" class="bold">Cod. Postal</label></td>
                <td>: <input type="text" name="zip" id="zip" value="<?php echo $cn->result('ConZip'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="country" class="bold">Pa&iacute;s</label></td>
                <td>: <input type="text" name="country" id="country" value="<?php echo $cn->result('ConCou'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="phone" class="bold">Tel&eacute;fono</label></td>
                <td>: <input type="text" name="phone" id="phone" value="<?php echo $cn->result('ConPho'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="fax" class="bold">Fax</label></td>
                <td>: <input type="text" name="fax" id="fax" value="<?php echo $cn->result('ConFax'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="map" class="bold">Google Map</label></td>
                <td>: <input type="text" name="map" id="map" value="<?php echo $cn->result('ConMap'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="map_driving" class="bold">Mapa Vial</label></td>
                <td>: <input type="text" name="map_driving" id="map_driving" value="<?php echo $cn->result('ConGooMap'); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
    </fieldset>
</form>