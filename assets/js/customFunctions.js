function stateCheckBox(handler)
{
	if( handler.is(':checked') ) {
	    return true;
	}
	return false;
}
function requeriedInput(handler,panelMessage,sMessage)
{
	if(handler.val().length>0)
	{
		return true;
	}
	else
	{
		handler.addClass('has-error');
		handler.addClass('classplaceerror');
		handler.attr(panelMessage, sMessage);
		return false;
	}
}
function ajaxAction(parameter)
{
	var resp="";
	 $.ajax({
         type: "POST",
         async:false, 
         url: "crud/action.php",
         data: parameter,
         success: function (msg) {
             resp=msg;
         }        
     });
	 return resp;
}
function getNotifications()
{
	var id =$("#editUser").val();
	return ajaxAction("notTyp="+id+"&action=6");
}
function getFavorites()
{
	var id =$("#editUser").val();
	return ajaxAction("userId="+id+"&action=9");
}