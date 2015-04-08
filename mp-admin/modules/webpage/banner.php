<a href="#" class="new">Nuevo</a>
<a href="#" class="cancel list">Cerrar</a>
<h1>Banner</h1>
<a href="./">Inicio </a> - <a href="#" class="list">Banner</a><br /><br /><br />
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
<script src="../lib/jquery-asyncUpload-0.1/swfupload.js" type="text/javascript"></script>
<script src="../lib/jquery-asyncUpload-0.1/jquery-asyncUpload-0.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    var mod = 21;
    mp_list(mod);
    Shadowbox.init();
    $(".new").click(function(){ mp_new(mod); return false; });
    $("#search").keyup(function(){ mp_search(mod); return false; });
    $(".list").live("click", function(){ mp_list(mod); return false; });
    $(".status").live("click", function(){ mp_status(mod, $(this)); return false; });
    $(".principal").live("click", function(){ mp_principal(mod, $(this)); return false; });
    $(".delete").live("click", function(){ mp_delete(mod, $(this)); return false; });
    $(".update").live("click", function(){ mp_update(mod, $(this)); return false; });

    $("form#save").live("submit", function(){
        if(!required('#name', 'Porfavor, ingrese un nombre.')) return false;
        if(!required('#alt', 'Porfavor, ingrese un atributo alt.')) return false;
        if(!required('#file_guid', 'Choose a File')) return false;
        mp_submit(mod, 2);
        return false;
    });
    $("form#update").live("submit", function(){
        if(!required('#name', 'Porfavor, ingrese un nombre.')) return false;
        if(!required('#alt', 'Porfavor, ingrese un atributo alt.')) return false;
        if(!required('#file_guid', 'Choose a File')) return false;
        mp_submit(mod, 5);
        return false;
    });
});
</script>