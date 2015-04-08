<h1>Configuraci&oacute;n</h1>
<a href="./">Inicio </a> - <a href="#" class="list">Apariencia</a><br />
<div align="center" class="MOForm">
    <br /><div id="list"></div>
    <br /><div id="form"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 11;
    mp_list(mod);
    Shadowbox.init();
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });
    $("form").live("submit", function(){
        if(!required('#logo_guid', 'Escoja un logo.')) return false;
        if(!required('#favicon_guid', 'Escoja un favicon.')) return false;
        mp_submit(mod, 5);
        return false;
    });
});
</script>