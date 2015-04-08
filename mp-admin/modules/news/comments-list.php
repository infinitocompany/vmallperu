<?php
require_once "../conf.php";
$search = isset($_POST['search']) ? strtolower(mp_scape($_POST['search'])) : "";
$filter = (isset($_POST['filter']) and !empty($_POST['filter'])) ? "c.blog_id = '".$_POST['filter']."' AND" : "";
$cn->query("SELECT c.id, b.name, c.nickname, c.email, c.content, c.date, c.status FROM mp_comment c INNER JOIN mp_news b ON c.blog_id = b.id WHERE $filter LOWER(CONCAT(b.name, ' ', c.nickname, ' ', c.content)) like '%$search%' ORDER BY c.id DESC");
?>
<table width="100%" class="listing">
	<thead>
		<tr>
			<th width="30">N&deg;</th>
			<th width="150">News Name</th>
			<th>Nickname / Email</th>
			<th width="200">Content</th>
			<th width="100">Date</th>
			<th width="40">Status</th>
			<th width="40">Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $cn->fetch()){ ?>
		<tr>
			<td class="center"><?php echo $row['id']; ?></td>
			<td><?php echo mp_unscape($row['name']); ?></td>
			<td><?php echo mp_unscape($row['nickname']); ?><br />
			<a href="mailto:<?php echo mp_unscape($row['email']); ?>"><?php echo mp_unscape($row['email']); ?></a></td>
			<td><?php echo mp_cut(mp_unscape($row['content']), 140); ?></td>
			<td><?php echo mp_parseTime($row['date']); ?></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button status<?php if($row['status'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['status'] == 0 ? "Activate" : "Inactivate"; ?>" value="<?php echo $row['status']; ?>"></a></td>
			<td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button delete" title="Delete"></a></td>
		</tr>
		<?php } ?>
		<?php if($cn->numrows() == 0) echo '<tr><td colspan="10" class="row_error">No Records.</td></tr>'; ?>
	</tbody>
</table>