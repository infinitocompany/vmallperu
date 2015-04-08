<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT MenID, MenSta, MenNam FROM itech_menu WHERE LOWER(MenNam) like '%$search%' ORDER BY MenNam ASC");
$cnt=1;
?>
<table width="100%" class="listing">
    <thead>
        <tr>
            <th width="30">N&deg;</th>
            <th>Nombre</th>
            <th width="40">Estado</th>
            <th width="40">Editar</th>
            <th width="40">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $cn->fetch()){ ?>
        <tr>
            <td class="center"><?php echo $cnt;$cnt++; ?></td>
            <td><?php echo mp_unscape($row['MenNam']); ?></a></td>
            <td class="center"><a href="#" id="<?php echo $row['MenID']; ?>" class="button status<?php if($row['MenSta'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['MenSta'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['MenSta']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['MenID']; ?>" class="button update" title="Editar"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['MenID']; ?>" class="button delete" title="Eliminar"></a></td>
        </tr>
        <?php } ?>
        <?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros Para Mostrar.</td></tr>'; ?>
    </tbody>
</table>