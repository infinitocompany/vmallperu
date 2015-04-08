<a href="#" class="new">Nuevo</a>
<a href="#" class="cancel list">Cerrar</a>
<h1>Men&uacute;</h1>
<a href="./">Inicio </a> - <a href="#" class="list">Men&uacute;</a><br /><br /><br />
<div class="MOForm">
    <fieldset class="search">
        <legend>Buscar Informaci&oacute;n</legend>
        <table>
            <tr>
                <td><label for="search" class="bold">Ingrese el t&eacute;rmino de su b&uacute;squeda</label></td>
                <td>: <input type="text" name="search" id="search" /></td>
            </tr>
        </table>
    </fieldset>
    <div id="list"></div>
    <div id="form"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 22;
    mp_list(mod);
    Shadowbox.init();
    $(".new").click(function(){ mp_new(mod); return false; });
    $("#search").keyup(function(){ mp_search(mod); return false; });
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".status").live("click", function(){ mp_status(mod, $(this)); return false; });
    $(".delete").live("click", function(){ mp_delete(mod, $(this)); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });

    $("form#save").live("submit", function(){
        if(!required('#name', 'Porfavor, ingrese un nombre.')) return false;
        if(!required('#link', 'Porfavor, ingrese un enlace.')) return false;
        mp_submit(mod, 2);
        return false;
    });
    $("form#update").live("submit", function(){
        if(!required('#name', 'Porfavor, ingrese un nombre.')) return false;
        if(!required('#link', 'Porfavor, ingrese un enlace.')) return false;
        mp_submit(mod, 5);
        return false;
    });
});
</script>