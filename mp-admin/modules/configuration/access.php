<h1>Configuraci&oacute;n</h1>
<a href="./">Inicio </a> - <a href="#" class="list">Acceso</a><br />
<div align="center" class="MOForm">
	<br /><div id="list"></div>
	<br /><div id="form"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 10;
    mp_list(mod);
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });
    $("form").live("submit", function(){
        if(!required('#username', 'Porfavor, ingrese un nombre de usuario.')) return false;		
        if(!equal('#pass', '#passw', 'Porfavor, ingrese una contrase&ntilde;a.', 'Las contrase&ntilde;as ingresadas como nuevas no coinciden.')) return false;
        if(!required('#email', 'Porfavor, ingrese un correo electr&oacute;nico.') || !validate_email('#email')) return false;
        mp_submit(mod, 5);
        return false;
    });
});
</script>