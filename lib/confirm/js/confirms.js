function confirm(message, callback){
	$('#confirm').modal({
		close: false, 
		overlayId: 'confirmModalOverlay',
		containerId: 'confirmModalContainer', 
		onShow: function(dialog){
			dialog.data.find('.message').append(message);
			dialog.data.find('.yes').click(function(){
				if($.isFunction(callback)) callback.apply();
				$.modal.close();
			});
		}
	});
}