<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT CliID, CliNam, CliPho, CliSta, CliDat FROM clients WHERE LOWER(CliNam) like '%$search%' ORDER BY CliID DESC");
$cnt=1;
?>
<table width="100%" class="listing">
	<thead>
		<tr>
			<th width="30">N&deg;</th>
			<th>Nombre</th>
			<th width="180">Fecha Creaci&oacute;n</th>
			<th width="40">Imagen</th>
			<th width="40">Estado</th>
			<th width="40">Editar</th>
			<th width="40">Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $cn->fetch()){ ?>
		<tr>
			<td class="center"><?php echo $cnt;$cnt=$cnt+1; ?></td>
			<td><a href="./?mod=31&amp;id=<?php echo $row['CliID']; ?>"><?php echo mp_unscape($row['CliNam']); ?></a></td>
			<td><?php echo mp_parseTime($row['CliDat']); ?></td>
			<td class="center"><a href="../userfiles/<?php echo $row['CliPho']; ?>" rel="shadowbox;" class="button file" title="<?php echo mp_unscape($row['CliAlt']); ?>"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['CliID']; ?>" class="button status<?php if($row['CliSta'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['CliSta'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['CliSta']; ?>"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['CliID']; ?>" class="button update" title="Editar"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['CliID']; ?>" class="button delete" title="Eliminar"></a></td>
		</tr>
		<?php } ?>
		<?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros Para Mostrar.</td></tr>'; ?>
	</tbody>
</table>