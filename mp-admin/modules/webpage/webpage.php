<a href="#" class="cancel list">Cerrar</a>
<h1>P&aacute;gina Web</h1>
<a href="./">Inicio </a> - <a href="#" class="list">P&aacute;gina Web</a><br /><br /><br />
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
<script src="../lib/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 20;
    mp_list(mod);
    $("#search").keyup(function(){ mp_search(mod); return false; });
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });
    $("form#update").live("submit", function(){
        if(!required('#title', 'Debe ingresar un t&iacute;tulo.')) return false;
        if(!required('#tinymce', 'Debe ingresar un contenido.')) return false;
        mp_submit(mod, 5);
        return false;
    });
});
</script>