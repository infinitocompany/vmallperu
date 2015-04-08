<?php
require_once "../conf.php";
$cn->query("SELECT ConFacLnk, ConTwiLnk, ConGooLnk, ConLinLnk, ConSky, ConYou, ConVim FROM itech_configuration");
?>
<br />
<fieldset>
    <legend>Informaci&oacute:n</legend>
    <table width="100%">
        <tr>
            <td><label class="bold">Facebook</label></td>
            <td>: <?php echo $cn->result('ConFacLnk') != "" ? $cn->result('ConFacLnk') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Twitter</label></td>
            <td>: <?php echo $cn->result('ConTwiLnk') != "" ? $cn->result('ConTwiLnk') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Google+</label></td>
            <td>: <?php echo $cn->result('ConGooLnk') != "" ? $cn->result('ConGooLnk') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Linkedin</label></td>
            <td>: <?php echo $cn->result('ConLinLnk') != "" ? $cn->result('ConLinLnk') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Skype</label></td>
            <td>: <?php echo $cn->result('ConSky') != "" ? $cn->result('ConSky') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Youtube</label></td>
            <td>: <?php echo $cn->result('ConYou') != "" ? $cn->result('ConYou') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Vimeo</label></td>
            <td>: <?php echo $cn->result('ConVim') != "" ? $cn->result('ConVim') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="Editar" class="update" /></td>
        </tr>
    </table>
</fieldset>