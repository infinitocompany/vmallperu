<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$cn->query("SELECT id, name, file, detail, status, date FROM mp_news WHERE LOWER(name) like '%$search%' ORDER BY id DESC");
?>
<table width="100%" class="listing">
	<thead>
		<tr>
			<th width="30">N&deg;</th>
			<th>Name</th>
			<th width="200">Detail</th>
			<th width="80">Date</th>
			<th width="40">File</th>
			<th width="40">Status</th>
			<th width="40">Edit</th>
			<th width="40">Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $cn->fetch()){ ?>
		<tr>
			<td class="center"><?php echo $row['id']; ?></td>
			<td><a href="./?mod=81&amp;id=<?php echo $row['id']; ?>"><?php echo mp_unscape($row['name']); ?></a></td>
			<td><?php echo mp_cut($row['detail'], 200); ?></td>
			<td><?php echo mp_parseTime($row['date']); ?></td>
			<td class="center"><a href="../userfiles/<?php echo $row['file']; ?>" rel="shadowbox;width=480;height=240;" class="button file" title="<?php echo mp_unscape($row['name']); ?>"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button status<?php if($row['status'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['status'] == 0 ? "Activate" : "Inactivate"; ?>" value="<?php echo $row['status']; ?>"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button update" title="Edit"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button delete" title="Delete"></a></td>
		</tr>
		<?php } ?>
		<?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Records.</td></tr>'; ?>
	</tbody>
</table>