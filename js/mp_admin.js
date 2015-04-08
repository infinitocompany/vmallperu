$.ajaxSetup({
    type: 'post',
    url: 'directory.php',
    error: function(data){ alert(data.responseText); }
});

$(document).ready(function(){
    var nav = eval($("#nav").height() - 30);
    if(nav > $("#content").height()) $("#content").css("min-height", nav + "px");
    var blank = ($(document).height() - $("#container").height()) - ($("#footer_admin").height() + 40);
    if(blank > 0) $("#content").css("min-height", ($("#content").height() + blank) + "px");
	
    var span_slide_status = new Array();
    $("#nav > ul > li").each(function(){
        var span_slide = $('<span />').click(function(){
            span_slide_status[$(this).parent().index()] = $(this).next().next().is(":visible");
            $(this).next().next().slideToggle();
        });
        if($("ul:visible", this).size()){
            span_slide_status[$(this).index()] = false;
            $(this).prepend(span_slide);
        }
    });
    $("#nav > ul > li").hover(function(){
        var span_slide = $('<span />').click(function(){
            span_slide_status[$(this).parent().index()] = $(this).next().next().is(":visible");
            $(this).next().next().slideToggle();
        });
        if($(this).html().search(/<\/ul>/) >= 0 && $("ul:hidden", this).size()) $(this).prepend(span_slide);
    }, function(){
        if($("ul:hidden", this).size() || span_slide_status[$(this).index()]) $("span", this).remove();
    });

    $("#form_login").submit(function(){
        if(!required('#username', 'Porfavor, ingrese un usuario.')) return false;
        if(!required('#password', 'Porfavor, ingrese una contrase&ntilde;a.')) return false;
        $.ajax({
            data: "mod=5&" + $(this).serialize(),
            success: function(msg){
                    if(msg != "") {mp_error(msg);}
                    else document.location = "./";
            }
        });
        return false;
    });
	
    $("#form_forgot_password").submit(function(){
        if(!required('#username2', 'Porfavor, ingrese un usuario.')) return false;
        $.ajax({
            data: "mod=6&" + $(this).serialize(),
            success: function(msg){
                if(msg != "") mp_error(msg);
                else{
                    $("#form_forgot_password, div.message").hide();
                    $("div.error").remove();
                    $("#form_login").fadeIn();
                    $("div.message").html("Su contrase&ntilde;a fue enviada a la cuenta de correo electr&oacute;nico asociada.").fadeIn();
                }
            }
        });
        return false;
    });

    $("a.forgot_password").live("click", function(){
        $("#form_login").hide();
        $("div.error").remove();
        $("#form_forgot_password, div.message").fadeIn();
        return false;
    });

    $("a.login").live("click", function(){
        $("#form_forgot_password, div.message").hide();
        $("div.error").remove();
        $("#form_login").fadeIn();
        return false;
    });

    $("#header a.logout").click(function(){
        confirm("Esta seguro de cerrar su sesi&oacute;n?", function(){
            $.ajax({ data: "mod=7", success: function(msg){ document.location = "./"; } });
        });
        return false;
    });
});

function mp_error(text){
    if(!$("div.error").length) $("form:visible").before('<div class="error"></div>');
    $("div.error").hide().html('<strong>ERROR: </strong>' + text).fadeIn();
    if(location.href.search(/mod/) >= 0) $("html, body").animate({scrollTop: $("#content").offset().top}, 1000);
}

function mp_search(mod){
    $.ajax({
        data: "mod=" + mod + "&search=" + $("#search").val(),
        success: function(html){
            $("#list").html(html);
            Shadowbox.setup();
        }
    });
}

function mp_list(mod){
    var add_data = $(".filter").length > 0 ? "&filter=" + $(".filter").val() : "";
    $.ajax({
        data: "mod=" + mod + add_data,
        success: function(html){
            $("#form, #list, .search, a.cancel").hide();
            $("#list").html(html);
            $(".search, #list, a.new").fadeIn();
            Shadowbox.setup();
            mp_style();
            $("textarea[class*=tinymce]").each(function(){ tinyMCE.execCommand('mceRemoveControl', false, $(this).attr("id")); });
            $("#content #list table.listing tbody tr:nth-child(odd)").addClass("odd");
            $("#content #list table.listing tbody tr").hover(
                function(){ $(this).addClass("hover"); },
                function(){ $(this).removeClass("hover"); }
            );
        }
    });
}

function mp_new(mod){
    $.ajax({
        data: "mod=" + mod + "&do=1",
        success : function(html){
            $("#form, .search, #list, a.new").hide();
            $("#form").html(html);
            $("#form, a.cancel").fadeIn();
            $.getScript("directory.php?mod=2");
            mp_style();
        }
    });
}

function mp_update(mod, e){
    $.ajax({
        data: "mod=" + mod + "&do=1&id=" + e.attr("id"),
        success : function(html){
            $("#form, .search, a.new").hide();
            $("#list").empty();
            $("#form").html(html);
            $("#form, a.cancel").fadeIn();
            $.getScript("directory.php?mod=2");
            mp_style();
        }
    });
}

function mp_submit(mod, $do){
    $.ajax({
        data: "mod=" + mod + "&do=" + $do + "&" + $("form").serialize(),
        success: function(){ mp_list(mod); }
    });
}

function mp_status(mod, e){
    value = e.attr("value");
    $.ajax({
        data: "mod=" + mod + "&do=3&id=" + e.attr("id") + "&value=" + value,
        success: function(){
            e.attr("value", (value == 1 ? 0 : 1));
            e.attr("title", (value == 0 ? "Activo" : "Inactivo"));
            e.fadeOut(250, function(){ e.toggleClass("status_inactive").fadeIn(250); });
        }
    });
}

function mp_principal(mod, e){
    value = e.attr("value");
    $.ajax({
        data: "mod=" + mod + "&do=6&id=" + e.attr("id") + "&value=" + value,
        success: function(){
            e.attr("value", (value == 1 ? 0 : 1));
            e.attr("title", (value == 0 ? "Principal" : ""));
            e.fadeOut(250, function(){ e.toggleClass("principal_inactive").fadeIn(250); });
        }
    });
}

function mp_delete(mod, e){
    confirm("Are you sure to delete the record?", function(){
        $.ajax({
            data: "mod=" + mod + "&do=4&id=" + e.attr("id"),
            success: function(){
                e.parent().parent().fadeOut(function(){
                    e.parent().parent().remove();
                    $("#list tr").removeClass("odd").filter(":nth-child(odd)").addClass("odd");
                    if($("#list tr").length == 1){
                            $('#list tbody').append('<tr><td colspan="10" class="row_error center">No Existen Registros a Mostrar.</td></tr>');
                    }
                });
            }
        });
    });
}

function mp_style(){
    var width = 0;
    $("fieldset:visible > table > tbody > tr > td:first-child label").each(function(){ if($(this).width() > width) width = $(this).width(); });
    $("fieldset:visible > table > tbody > tr").addClass("texgray").each(function(){
        if($(this).children().filter(":nth-child(2)").size()){
            if($(this).children().filter(":nth-child(2)").html().search(/<input|<select|<textarea/) >= 0 && $(this).children().filter(":nth-child(2)").html().search(/type="hidden"/) < 0){
                $(this).children().filter(":nth-child(1)").attr("width", width + 10).css({"vertical-align": "top", "padding-top": 8});
            }else{
                $(this).children().attr("height", 33).css({"vertical-align": "top", "padding-top": 8});
                $(this).children().filter(":nth-child(1)").attr("width", width + 15);
            }
        }
    });
}

function mp_tinymce(){
    tinyMCE.init({
        mode : "textareas",
        theme : 'advanced', 
        skin : 'o2k7', 
        width: '100%', 
        height: '150px', 
        language : 'en', 
        docs_language : 'en', 
        skin_variant : 'silver', 
        editor_selector : "tinymce_mini", 
        document_base_url: 'http://vmallperu.com/', 
        plugins: 'safari, pagebreak, style, layer, table, save, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, print, contextmenu, paste, directionality, fullscreen, noneditable, visualchars, nonbreaking, xhtmlxtras, template, wordcount', 
        theme_advanced_buttons1 : 'bold, |, italic, |, underline, |, forecolor, |, link, |, unlink', 
        theme_advanced_buttons2: '', 
        theme_advanced_buttons3: '', 
        theme_advanced_toolbar_location: 'top', 
        theme_advanced_toolbar_align: 'left', 
        theme_advanced_resizing: false, 
        content_css : 'css/reset.css, css/text.css'
    });
    tinyMCE.init({
        mode : "textareas",
        theme : 'advanced', 
        skin : 'o2k7', 
        width: '100%', 
        height: '450px', 
        language : 'en', 
        docs_language : 'en', 
        skin_variant : 'silver', 
        editor_selector : "tinymce", 
        document_base_url: 'http://vmallperu.com/', 
        plugins : 'safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount', 
        theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect', 
        theme_advanced_buttons2 : 'cut,copy,paste,pastetext,pasteword,selectall,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,|,insertdate,inserttime', 
        theme_advanced_buttons3 : 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print', 
        theme_advanced_buttons4 : 'forecolor,backcolor,styleprops,|,insertlayer,moveforward,movebackward,absolute,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,|,template,|,preview,|,newdocument,|,fullscreen,|,code', 
        theme_advanced_toolbar_location : 'top', 
        theme_advanced_toolbar_align : 'left', 
        theme_advanced_statusbar_location : 'bottom', 
        plugin_insertdate_dateFormat : '%m-%d-%Y', 
        plugin_insertdate_timeFormat : '%H:%M:%S', 
        theme_advanced_resizing : false, 
        content_css : 'css/reset.css, css/text.css', 
        file_browser_callback : 'mp_ajaxfilemanager'
    });
}

function mp_ajaxfilemanager(field_name, url, type, win){
    switch (type){
        case "image": break;
        case "media": break;
        case "flash": break;
        case "file":  break;
        default: return false;
    }
    tinyMCE.activeEditor.windowManager.open({
        url: "../lib/ajaxfilemanager/ajaxfilemanager.php?editor=tinymce",
        width: 800,
        height: 500,
        inline : "yes",
        close_previous : "no"
    },{
        window : win,
        input : field_name
    });	
    return false;
}

var key;
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57 , '.' = 46, '-' = 45, ' ' = 32
function type_number(evt){
    (document.all)?key=evt.keyCode:key=evt.which;
    return (key <= 13 || key == 46 || key == 45 || key == 32 || evt.ctrlKey || (key >= 48 && key <= 57));
}

function type_price(evt){
    (document.all)?key=evt.keyCode:key=evt.which;
    return (key <= 13 || key == 46 || (key >= 48 && key <= 57));
}

function required(elem, msg, conten){
    if(conten == null) conten = "";
    if($.trim($(elem).val()) == conten){ mp_error(msg); $(elem).focus(); return false; }
    return true;
}

function equal(elem, elemb, msg, msgb, conten){
    if(conten == null) conten = "";
    if($.trim($(elem).val()) == conten){ mp_error(msg); $(elem).focus(); return false; }
    if($(elem).val() != $(elemb).val()){ mp_error(msgb); $(elemb).focus(); return false; }
    return true;
}

function maxlength(elem, value, msg){
    if(msg == null) msg = "You must enter " + value + " characters";
    if($.trim($(elem).val()).length < value){ mp_error(msg); $(elem).focus(); return false; }
    return true;
}

function validate_email(elem){
    if($.trim($(elem).val()) != "" && !email_check($.trim($(elem).val()))){ $(elem).focus(); return false; }
    return true;
}

function email_check(email){
    var msg = "The email address is invalid. ";
    var atom = '\[^\\s\\(\\)<>@,;:\\\\\\\"\\.\\[\\]\]+';
    var word = "(" + atom + "|(\"[^\"]*\"))";
    var userPat = new RegExp("^" + word + "(\\." + word + ")*$");
    var domainPat = new RegExp("^" + atom + "(\\." + atom +")*$");
    var matchArray = email.match(/^(.+)@(.+)$/);
    if(matchArray == null){ mp_error(msg + "(verify [@] and [.])"); return false; }
    var user = matchArray[1];
    var domain = matchArray[2];
    if(user.match(userPat) == null){ mp_error(msg + "(verify data before [@])"); return false; }
    var IPArray = domain.match(/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/);
    if(IPArray != null){
        for(var i = 1; i <= 4; i++){
            if(IPArray[i] > 255){ mp_error(msg + "(Incorrect destination IP)"); return false; }
        }
        return true;
    }
    if(domain.match(domainPat) == null){ mp_error(msg + "(verify data after [@])"); return false; }
    var atomPat = new RegExp(atom, "g");
    var domArr = domain.match(atomPat);
    var len = domArr.length;
    if(domArr[len - 1].length < 2 || domArr[len - 1].length > 3){
       mp_error(msg + "(verify data after [.])"); return false;
    }
    if(len < 2){ mp_error(msg + "(verify data after [.])"); return false; }
    return true;
}