<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT s.SubCatID, s.SubCatNam, s.SubCatSta, s.SubCatDat, c.CatNam FROM itech_category AS c, itech_subcategory AS s WHERE c.CatID=s.CatID AND LOWER(CONCAT(s.SubCatNam,' ',c.CatNam)) like '%$search%' ORDER BY s.SubCatNam ASC");
$cnt=1;
?>
<table width="100%" class="listing">
    <thead>
        <tr>
            <th width="30">N&deg;</th>
            <th>Nombre</th>
            <th width="180">Categor&iacute;a</th>
            <th width="40">Estado</th>
            <th width="40">Editar</th>
            <th width="40">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $cn->fetch()){ ?>
        <tr>
            <td class="center"><?php echo $cnt;$cnt=$cnt+1; ?></td>
            <td><a href="./?mod=41&amp;id=<?php echo $row['SubCatID']; ?>"><?php echo mp_unscape($row['SubCatNam']); ?></a></td>
            <td><?php echo mp_unscape($row['CatNam']); ?></td>
            <td class="center"><a href="#" id="<?php echo $row['SubCatID']; ?>" class="button status<?php if($row['SubCatSta'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['SubCatSta'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['SubCatSta']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['SubCatID']; ?>" class="button update" title="Editar"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['SubCatID']; ?>" class="button delete" title="Eliminar"></a></td>
        </tr>
        <?php } ?>
        <?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros Para Mostrar.</td></tr>'; ?>
    </tbody>
</table>