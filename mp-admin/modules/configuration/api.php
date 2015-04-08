<h1>Configuraci&oacute;n</h1>
<a href="./">Inicio </a> - <a href="#" class="list">Redes Sociales</a><br />
<div align="center" class="MOForm">
    <br /><div id="list"></div>
    <br /><div id="form"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 13;
    mp_list(mod);
    Shadowbox.init();
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });
    $("form").live("submit", function(){ mp_submit(mod, 5); return false; });
});
</script>