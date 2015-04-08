<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT c.CatID, c.CatNam, c.CatSta, c.CatDat, s.SubMenNam FROM itech_category AS c, itech_submenu AS s WHERE c.SubMenID=s.SubMenID AND LOWER(CONCAT(c.CatNam,' ',s.SubMenNam)) like '%$search%' ORDER BY c.CatNam ASC");
$cnt=1;
?>
<table width="100%" class="listing">
    <thead>
        <tr>
            <th width="30">N&deg;</th>
            <th>Nombre</th>
            <th width="180">SubMen&uacute;</th>
            <th width="40">Estado</th>
            <th width="40">Editar</th>
            <th width="40">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $cn->fetch()){ ?>
        <tr>
            <td class="center"><?php echo $cnt;$cnt=$cnt+1; ?></td>
            <td><a href="./?mod=41&amp;id=<?php echo $row['CatID']; ?>"><?php echo mp_unscape($row['CatNam']); ?></a></td>
            <td><?php echo mp_unscape($row['SubMenNam']); ?></td>
            <td class="center"><a href="#" id="<?php echo $row['CatID']; ?>" class="button status<?php if($row['CatSta'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['CatSta'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['CatSta']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['CatID']; ?>" class="button update" title="Editar"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['CatID']; ?>" class="button delete" title="Eliminar"></a></td>
        </tr>
        <?php } ?>
        <?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros Para Mostrar.</td></tr>'; ?>
    </tbody>
</table>