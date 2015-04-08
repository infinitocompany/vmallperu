<?php
require_once "../conf.php";
$cn->query("SELECT ConLog, ConSlo, ConFavIco, ConMas FROM itech_configuration");
?>
<br />
<fieldset>
    <legend>Informaci&oacute;n</legend>
    <table width="100%">        
        <tr>
            <td><label class="bold">Favicon</label></td>
            <td><img src="../userfiles/<?php echo $cn->result('ConFavIco'); ?>" width="16" height="16" /></td>
        </tr>
        <tr>
            <td><label class="bold">Logo</label></td>
            <td>: <a href="../userfiles/<?php echo $cn->result('ConLog'); ?>" rel="shadowbox">Ver Logo</a></td>
        </tr>
        <tr>
            <td><label class="bold">Mascota Virtual</label></td>
            <td>: <a href="../userfiles/<?php echo $cn->result('ConMas'); ?>" rel="shadowbox">Ver Mascota</a></td>
        </tr>
        <tr>
            <td><label class="bold">Slogan</label></td>
            <td>: <?php echo $cn->result('ConSlo') != "" ? $cn->result('ConSlo') : '<span class="gray">Vac&iacute;o</span>'; ?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="Editar" class="update" /></td>
        </tr>
    </table>
</fieldset>