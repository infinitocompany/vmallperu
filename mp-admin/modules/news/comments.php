<h1>News</h1>
<a href="./">Home </a> - <a href="#" class="list">Comments</a><br /><br /><br />
<div class="MOForm">
	<fieldset class="search">
		<legend>Filter Information</legend>
		<table>
			<tr>
				<td><label for="blog">Choose news name</label></td>
				<td><select class="filter"><option value="">All news</option><?php
				$cn->query("SELECT id, name FROM mp_news ORDER BY id DESC");
				while($row = $cn->fetch()) echo "<option value=\"$row[0]\"".($row[0] == $id ? ' selected="selected"' : '').">$row[1]</option>";
				?></select></td>
			</tr>
			<tr>
				<td><label for="search">Enter the search term please</label></td>
				<td><input type="text" name="search" id="search" /></td>
			</tr>
		</table>
	</fieldset>
	<div id="list"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var mod = 81;
	mp_list(mod);
	$("#search").keyup(function(){ mp_search(mod); return false; });
	$(".filter").change(function(){ mp_list(mod); return false; });
	$(".list").live("click", function(){ mp_list(mod); return false; });
	$(".status").live("click", function(){ mp_status(mod, $(this)); return false; });
	$(".delete").live("click", function(){ mp_delete(mod, $(this)); return false; });
});
</script>