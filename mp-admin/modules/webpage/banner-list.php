<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT BanID, BanNam, BanAlt, BanImg, BanSta, BanPri, BanDat FROM itech_banner WHERE LOWER(BanAlt) like '%$search%' ORDER BY BanID DESC");
$cnt=1;
?>
<table width="100%" class="listing">
    <thead>
        <tr>
            <th width="30">N&deg;</th>
            <th>Nombre</th>
            <th width="180">Fecha Creaci&oacute;n</th>
            <th width="40">Imagen</th>
            <th width="40">Principal</th>
            <th width="40">Estado</th>
            <th width="40">Editar</th>
            <th width="40">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $cn->fetch()){ ?>
        <tr>
            <td class="center"><?php echo $cnt;$cnt++; ?></td>
            <td><a href="./?mod=21&amp;id=<?php echo $row['BanID']; ?>"><?php echo mp_unscape($row['BanNam']); ?></a></td>
            <td><?php echo mp_parseTime($row['BanDat']); ?></td>
            <td class="center"><a href="../userfiles/<?php echo $row['BanImg']; ?>" rel="shadowbox;" class="button file" title="<?php echo mp_unscape($row['BanNam']); ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['BanID']; ?>" class="button principal<?php if($row['BanPri'] == 0) echo " principal_inactive"; ?>" title="<?php echo $row['BanPri'] == 0 ? "Principal" : ""; ?>" value="<?php echo $row['BanPri']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['BanID']; ?>" class="button status<?php if($row['BanSta'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['BanSta'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['BanSta']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['BanID']; ?>" class="button update" title="Editar"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['BanID']; ?>" class="button delete" title="Eliminar"></a></td>
        </tr>
        <?php } ?>
        <?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros Para Mostrar.</td></tr>'; ?>
    </tbody>
</table>