<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT id, city, rate, status FROM shipping_costs WHERE LOWER(city) like '%$search%' ORDER BY city ASC");
$cnt=1;
?>
<table width="100%" class="listing">
	<thead>
		<tr>
			<th width="30">N&deg;</th>
			<th>Distrito</th>
            <th width="40">Precio</th>
			<th width="40">Estado</th>
			<th width="40">Editar</th>
			<th width="40">Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $cn->fetch()){ ?>
		<tr>
			<td class="center"><?php echo $cnt;$cnt=$cnt+1; ?></td>
			<td><a href="./?mod=32&amp;id=<?php echo $row['id']; ?>"><?php echo mp_unscape($row['city']); ?></a></td>
            <td><a href="./?mod=32&amp;id=<?php echo $row['id']; ?>"><?php echo mp_unscape($row['rate']); ?></a></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button status<?php if($row['status'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['status'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['status']; ?>"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button update" title="Editar"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button delete" title="Eliminar"></a></td>
		</tr>
		<?php } ?>
		<?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Existen Registros Para Mostrar.</td></tr>'; ?>
	</tbody>
</table>