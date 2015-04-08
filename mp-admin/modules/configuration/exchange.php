<h1>Tipo de Cambio</h1>
<a href="./">Inicio </a> - <a href="#" class="list">Tipo de Cambio</a><br />
<div align="center" class="MOForm">
    <br /><div id="list"></div>
    <br /><div id="form"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 14;
    mp_list(mod);
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });
    $("form").live("submit", function(){
        if(!required('#exchange', 'Porfavor, ingrese el tipo de cambio del d&iacute;a.')) return false;
        mp_submit(mod, 5);
        return false;
    });
});
</script>