<h1>Configuraci&oacute;n</h1>
<a href="./">Inicio </a> - <a href="#" class="list">Empresa</a><br />
<div align="center" class="MOForm">
    <br /><div id="list"></div>
    <br /><div id="form"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 12;
    mp_list(mod);
    Shadowbox.init();
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });
    $("form").live("submit", function(){ 
        if(!required('#email', 'Porfavor, ingrese un correo electr&oacute;nico.') || !validate_email('#email')) return false;
        mp_submit(mod, 5); return false; 
    });
});
</script>