<a href="#" class="new">New</a>
<a href="#" class="cancel list">Cancel</a>
<h1>News</h1>
<a href="./">Home </a> - <a href="#" class="list">Themes</a><br /><br /><br />
<div class="MOForm">
	<fieldset class="search">
		<legend>Filter Information</legend>
		<table>
			<tr>
				<td><label for="search">Enter the search term please</label></td>
				<td><input type="text" name="search" id="search" /></td>
			</tr>
		</table>
	</fieldset>
	<div id="list"></div>
	<div id="form"></div>
</div>
<script src="../lib/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	var mod = 80;
	mp_list(mod);
	Shadowbox.init();
	$(".new").click(function(){ mp_new(mod); return false; });
	$("#search").keyup(function(){ mp_search(mod); return false; });
	$(".list").live("click", function(){ mp_list(mod); return false; });
	$(".status").live("click", function(){ mp_status(mod, $(this)); return false; });
	$(".delete").live("click", function(){ mp_delete(mod, $(this)); return false; });
	$(".update").live("click", function(){ mp_update(mod, $(this)); return false; });

	$("form#save").live("submit", function(){
		if(!required('#name', 'You must enter a Name')) return false;
		//if(!required('#file_guid', 'Choose a File')) return false;
		if(!required('#detail', 'You must enter a Detail')) return false;
		if(!required('#tinymce', 'You must enter a Content')) return false;
		mp_submit(mod, 2);
		return false;
	});

	$("form#update").live("submit", function(){
		if(!required('#name', 'You must enter a Name')) return false;
		//if(!required('#file_guid', 'Choose a File')) return false;
		if(!required('#detail', 'You must enter a Detail')) return false;
		if(!required('#tinymce', 'You must enter a Content')) return false;
		mp_submit(mod, 5);
		return false;
	});
});
</script>