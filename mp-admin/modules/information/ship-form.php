<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
	$cn->query("SELECT city, rate FROM shipping_costs WHERE id = '$id'");
	$row = $cn->fetch();
}else $row = array("city"=>"", "rate"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
	<fieldset>
		<legend>Ingresar Informacio&oacute;n</legend>
		<table width="100%">
			<tr>
				<td><label for="name">Distrito</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo mp_unscape($row['city']); ?>" /></td>
			</tr>
            <tr>
				<td><label for="name">Costo de Envio</label></td>
				<td><input type="text" name="price" id="price" value="<?php echo mp_unscape($row['rate']); ?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
	</fieldset>
</form>
<script type="text/javascript">
$(document).ready(function(){
	//$("#price").maskMoney({symbol:"R$",decimal:",",thousands:"."});
	$("#price").mask("99.99");
});
</script>