<?php
require_once "../conf.php";
$id = isset($_POST['id']) ? $_POST['id'] : "";
if(!empty($id)){
	$cn->query("SELECT email FROM suscription WHERE id = '$id'");
	$row = $cn->fetch();
}else $row = array("email"=>"");
?>
<form id="<?php echo empty($id) ? "save" : "update"; ?>">
	<fieldset>
		<legend>Ingresar Informacio&oacute;n</legend>
		<table width="100%">
			<tr>
				<td><label for="name">Correo Electr&oacute;nico</label></td>
				<td><input type="text" name="email" id="email" value="<?php echo mp_unscape($row['email']); ?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><br /><input type="submit" value="Guardar" /> <input type="button" value="Cancelar" class="list" /></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
	</fieldset>
</form>