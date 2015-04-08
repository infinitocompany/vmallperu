<?php
require_once "../conf.php";
$cn->query("SELECT ConFacLnk, ConTwiLnk, ConGooLnk, ConLinLnk, ConSky, ConYou, ConVim FROM itech_configuration");
?>
<form>
    <fieldset>
        <legend>Actualizar Informaci&oacute;n</legend>
        <table width="100%">
            <tr>
                <td><label for="facebook" class="bold">Facebook</label></td>
                <td>: <input type="text" name="facebook" id="facebook" value="<?php echo $cn->result('ConFacLnk'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="twitter" class="bold">Twitter</label></td>
                <td>: <input type="text" name="twitter" id="twitter" value="<?php echo $cn->result('ConTwiLnk'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="google" class="bold">Google +</label></td>
                <td>: <input type="text" name="google" id="google" value="<?php echo $cn->result('ConGooLnk'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="linkedin" class="bold">Linkedin</label></td>
                <td>: <input type="text" name="linkedin" id="linkedin" value="<?php echo $cn->result('ConLinLnk'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="skype" class="bold">Skype</label></td>
                <td>: <input type="text" name="skype" id="skype" value="<?php echo $cn->result('ConSky'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="youtube" class="bold">Youtube</label></td>
                <td>: <input type="text" name="youtube" id="youtube" value="<?php echo $cn->result('ConYou'); ?>" /></td>
            </tr>
            <tr>
                <td><label for="vimeo" class="bold">Vimeo</label></td>
                <td>: <input type="text" name="vimeo" id="vimeo" value="<?php echo $cn->result('ConVim'); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
            </tr>
        </table>
    </fieldset>
</form>