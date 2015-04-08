$(document).ready(function() {
    ajax.maintenance();
});

ajax = {    
    maintenance: function() {
       menu();
       search();
       register();
       login();
       logout();
       pass();
       notification();
       favorite();
       buy();
       modal_register();
       detail();
       close();
       replace();
       //facebooklink();
    }
};
function message (title, msg, type){
    $('.modal-title').text(title); 
    $('.modal-message').text(msg);
    $("#modal_register").removeClass('hide');
    if(type==0){
        $("#modal_register").addClass('hide');
    }
    $('#message').modal('show');
};
var pass = function(){
    $(".pass_catalog").off().on('click', function (e) {
        e.preventDefault();
        var userid = $("#userid").val();
        if(userid.length>0){
            window.location.href = 'catalogos.php';
        }else{
            message('Acceso a Catálogo','Necesita iniciar sesión, para poder acceder a esta sección.', 1);
        }        
    });
};
var modal_register = function(){
    $("#modal_register").off().on('click', function (e) {
        e.preventDefault();
        $('#message').modal('hide');
        window.location.href = 'registro.php';
    });
};
var close = function(){
    $("#ok").off().on('click', function (e) {
        e.preventDefault();
        $('#message').modal('hide');
    });
};    
var replace = function(){
    $(".replace_image").off().on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var image = $(this).data('image');
        $(".image_"+id).attr("src",image);
    });
};
var detail = function(){
    $(".inputcomprar").off().on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var user = $(this).data('user');
        var title = $(this).data('title');
        var description = $(this).data('description');
        var image = $(this).data('image');
        var facelin = $(this).data('facelin');
        $("#editID").val(id);
        $("#editUser").val(user);
        $("#send_facebook").attr('href',facelin);
        $('.modal-title').text(title);
        $('.modal-description').html(description);
        $('.modal-image').html('<img class="img-responsive" src="'+image+'"/>');
        $('#detail').modal('show');
    });
};

var notification = function () {  
    $("#send_notification").off().on('click', function (e) {
        e.preventDefault();
        var user = $("#editUser").val();
        $('#detail').modal('hide');
        if(user.length>0){
            $('#notification').modal('show');
        }else{
            message('Solicitud de Notificación','Necesita iniciar sesión, para poder procesar su solicitud.', 1);
        }
    });
}; 

/*
var facebooklink = function () {  
    $("#send_facebook").off().on('click', function (e) {
        e.preventDefault();
        alert('1');
        var facelin=$("#facelin").val();
        $(location).attr('href',facelin).attr('target','_blank');; 
        
        var user = $("#editUser").val();
        $('#detail').modal('hide');
        if(user.length>0){
            $('#notification').modal('show');
        }else{
            message('Solicitud de Notificación','Necesita iniciar sesión, para poder procesar su solicitud.', 1);
        }
        
    });
}; */
var favorite = function () {  
    $("#send_favorite").off().on('click', function (e) {
        e.preventDefault();
        var user = $("#editUser").val();
        $('#detail').modal('hide');
        if(user.length>0){
            message('Solicitud de Favorito','Estimado cliente su solicitud fue realizada con exito.', 1);
        }else{
            message('Solicitud de Favorito','Necesita iniciar sesión, para poder procesar su solicitud.', 1);
        }
    });
};

var buy = function () {  
    $("#send_information").off().on('click', function (e) {
        e.preventDefault();
        var user = $("#editUser").val();
        $('#detail').modal('hide');
        if(user.length>0){
            message('Solicitud de Oferta','Estimado cliente su solicitud fue realizada con exito.', 1);
        }else{
            message('Solicitud de Oferta','Necesita iniciar sesión, para poder procesar su solicitud.', 1);
        }        
    });
};        

var menu = function () {  
    $(".sub_menu").off().on('click', function (e) {
        e.preventDefault();
        var data = $(this).data('id');
        $(".opensub").removeClass("open");
        $("#tecnologia").addClass("open");
    });
};
var search = function(){
    $("#buttonsearch").off().on('click', function (e) {
        e.preventDefault();
        //$.post( "productos.php", { 'search': $("#inputsearch").val() } );
        window.location.href = 'productos.php?search='+$("#inputsearch").val();
    });
};
var register = function(){
    $("#buttonregister").off().on('click', function (e) {
        e.preventDefault();
        if(!required('#rname', 'Porfavor, ingrese un nombre.')) return false;
        if(!required('#rlastname', 'Porfavor, ingrese un apellido.')) return false;
        if(!required('#ruser', 'Porfavor, ingrese un correo electrónico.') || !validate_email('#ruser')) return false;
        if(!required('#rpass', 'Porfavor, ingrese una contraseña.')) return false;
        if(!$('#rcheck').is(':checked')) {
             message('Registro VMALL', 'Porfavor, debe aceptar los términos y condiciones.', 0);
             return false;
        }
        var _captcha= $('#defaultReal').val();
        var _hash=$('#defaultRealHash').val();
        var _name = $('#rname').val();
        var _lname = $('#rlastname').val();
        var _user = $('#ruser').val();
        var _pass = $('#rpass').val();
        $.ajax({
            type: "POST",
            url: "crud/action.php",
            data: "defaultReal="+ _captcha + "&defaultRealHash="+ _hash + "&action=4",
            success: function (msg) {
                if(msg=='true'){
                    $.ajax({
                        type: "POST",
                        url: "crud/action.php",
                        data: "rname="+ _name +"& rlname="+ _lname+"& ruser="+ _user +"& rpass="+ _pass+"& action=1",
                        success: function (msg) {
                            if(msg=='0'){
                                message('Registro VMALL', 'Usuario registrado con exito', 0);
                                //window.location.href = './';
                            }else{
                                message('Registro VMALL', 'Hubo un error en el registro, intentelo mas tarde.', 0);
                                //window.location.href = 'registro.php';
                            }
                        }        
                    });
                }else{
                    message('Registro VMALL', 'Porfavor, verifique el código captcha e intente nuevamente.', 0);
                }
            }        
        });
    });
};

var login = function(){
    $("#login").off().on('click', function (e) {
        e.preventDefault();
        if(!required('#username', 'Porfavor, ingrese un correo electrónico.') || !validate_email('#ruser')) return false;
        if(!required('#password', 'Porfavor, ingrese una contraseña.')) return false;
        var _username = $('#username').val();
        var _password = $('#password').val();
        $.ajax({
            type: "POST",
            url: "crud/action.php",
            data: "username="+ _username +"& password="+ _password+"& action=2",
            success: function (msg) {
                alert(msg);     
                window.location.href = 'solicitudes.php';
            }        
        });
    });
};
var logout= function(){
    $("#logout").off().on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "crud/action.php",
            data: "action=3",
            success: function (msg) {
                alert(msg);     
                window.location.href = './';
            }        
        });
    });
};
function validate_email(elem){
    if($.trim($(elem).val()) != "" && !email_check($.trim($(elem).val()))){ $(elem).focus(); return false; }
    return true;
};
function email_check(email){
    var msg = "El correo electrónico es invalido. ";
    var atom = '\[^\\s\\(\\)<>@,;:\\\\\\\"\\.\\[\\]\]+';
    var word = "(" + atom + "|(\"[^\"]*\"))";
    var userPat = new RegExp("^" + word + "(\\." + word + ")*$");
    var domainPat = new RegExp("^" + atom + "(\\." + atom +")*$");
    var matchArray = email.match(/^(.+)@(.+)$/);
    if(matchArray == null){ message('Registro VMALL', msg + "(verifique [@] y [.])", 0); return false; }
    var user = matchArray[1];
    var domain = matchArray[2];
    if(user.match(userPat) == null){ message('Registro VMALL', msg + "(verifique la información despúes de [@])", 0); return false; }
    var IPArray = domain.match(/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/);
    if(IPArray != null){
        for(var i = 1; i <= 4; i++){
            if(IPArray[i] > 255){ alert(msg + "(Incorrect destination IP)"); return false; }
        }
        return true;
    }
    if(domain.match(domainPat) == null){ message('Registro VMALL', msg + "(verifique la información despúes de [@])", 0); return false; }
    var atomPat = new RegExp(atom, "g");
    var domArr = domain.match(atomPat);
    var len = domArr.length;
    if(domArr[len - 1].length < 2 || domArr[len - 1].length > 3){
       message('Registro VMALL', msg + "(verifique la información despúes de [.])", 0); return false;
    }
    if(len < 2){ message('Registro VMALL', msg + "(verifique la información despúes de [.])",0); return false; }
    return true;
};
function required(elem, msg, conten){
    if(conten == null) conten = "";
    if($.trim($(elem).val()) == conten){ message('Registro VMALL',msg, 0);$(elem).focus(); return false; }
    return true;
};