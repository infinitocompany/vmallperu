<?php
require_once "../conf.php";
$cn->query("SELECT ConEma, ConSch, ConAdd, ConCit, ConSta, ConZip, ConCou, ConPho, ConFax, ConMap, ConGooMap FROM itech_configuration");
?>
<br />
<fieldset>
    <legend>Informaci&oacute;n</legend>
    <table width="100%">
        <tr>
           <td><label class="bold" for="email">Correo Electr&oacute;nico</label></td>
            <td>: <?php echo $cn->result('ConEma') != "" ? $cn->result('ConEma') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Horario</label></td>
            <td>: <?php echo $cn->result('ConSch') != "" ? $cn->result('ConSch') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Direcci&oacute;n</label></td>
            <td>: <?php echo $cn->result('ConAdd') != "" ? $cn->result('ConAdd') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Ciudad</label></td>
            <td>: <?php echo $cn->result('ConCit') != "" ? $cn->result('ConCit') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Estado</label></td>
            <td>: <?php echo $cn->result('ConSta') != "" ? $cn->result('ConSta') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Cod. Postal</label></td>
            <td>: <?php echo $cn->result('ConZip') != "" ? $cn->result('ConZip') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Pa&iacute;s</label></td>
            <td>: <?php echo $cn->result('ConCou') != "" ? $cn->result('ConCou') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Tel&eacute;fono</label></td>
            <td>: <?php echo $cn->result('ConPho') != "" ? $cn->result('ConPho') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Fax</label></td>
            <td>: <?php echo $cn->result('ConFax') != "" ? $cn->result('ConFax') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Google Map</label></td>
            <td>: <?php echo $cn->result('ConMap') != "" ? $cn->result('ConMap') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td><label class="bold">Mapa Vial</label></td>
            <td>: <?php echo $cn->result('ConGooMap') != "" ? $cn->result('ConGooMap') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="Editar" class="update" /></td>
        </tr>
    </table>
</fieldset>