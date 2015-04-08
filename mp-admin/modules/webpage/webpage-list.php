<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT WebPagID, WebPagNam, WebPagCon FROM itech_web_page WHERE lower(WebPagNam) like '%".strtolower($search)."%' ORDER BY WebPagID");
?>
<table width="100%" class="listing">
    <thead>
        <tr>
            <th width="120">Nombre</th>
            <th>Contenido</th>
            <th width="50">Editar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $cn->fetch()){ ?>
        <tr>
            <td><?php echo mp_unscape($row['WebPagNam']); ?></td>
            <td><?php echo mp_cut($row['WebPagCon'], 300); ?></td>
            <td class="center"><a href="#" id="<?php echo $row['WebPagID']; ?>" class="button update" title="Edit"></a></td>
        </tr>
        <?php } ?>
        <?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros a Mostrar.</td></tr>'; ?>
    </tbody>
</table>