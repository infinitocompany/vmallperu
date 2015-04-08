<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT GalID, GalTit, GalMaxDes, GalImg, GalSta, GalFav, GalPro, GalDatSta, GalDatEnd,GalFacLin FROM itech_gallery WHERE LOWER(GalTit) like '%$search%' ORDER BY GalTit ASC");
$cnt=1;
?>
<table width="100%" class="listing">
    <thead>
        <tr>
            <th width="30">N&deg;</th>
            <th width="100">Nombre</th>
            <th>Contenido</th>
            <th>Inicio Activaci&oacute;n</th>
            <th>Fin Activaci&oacute;n</th>
            <th width="40">Preferido</th>
            <th style="max-width: 50px;overflow: hidden;">Link Facebook</th>
            <th width="40">Imagen</th>
            <th width="40">Oferta D&iacute;a</th>
            <th width="40">Estado</th>
            <th width="40">Editar</th>
            <th width="40">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $cn->fetch()){ ?>
        <tr>
            <td class="center"><?php echo $cnt;$cnt++; ?></td>
            <td><a href="./?mod=40&amp;id=<?php echo $row['GalID']; ?>"><?php echo mp_unscape($row['GalTit']); ?></a></td>
            <td><?php echo mp_cut($row['GalMaxDes'], 300); ?></td>
            <td><?php echo mp_unscape($row['GalDatSta']); ?></td>
            <td><?php echo mp_unscape($row['GalDatEnd']); ?></td>
            <td><?php echo $row['GalFav']; ?></td>
            <td style="max-width: 50px;overflow: hidden;"><p><?php echo $row['GalFacLin']; ?></p></td>
            <td class="center"><a href="../userfiles/<?php echo $row['GalImg']; ?>" rel="shadowbox;" class="button file" title="<?php echo mp_unscape($row['GalTit']); ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['GalID']; ?>" class="button principal<?php if($row['GalPro'] == 0) echo " principal_inactive"; ?>" title="<?php echo $row['GalPro'] == 0 ? "Promoci&oacute;n" : ""; ?>" value="<?php echo $row['GalPro']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['GalID']; ?>" class="button status<?php if($row['GalSta'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['GalSta'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['GalSta']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['GalID']; ?>" class="button update" title="Editar"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['GalID']; ?>" class="button delete" title="Eliminar"></a></td>
        </tr>
        <?php } ?>
        <?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros Para Mostrar.</td></tr>'; ?>
    </tbody>
</table>