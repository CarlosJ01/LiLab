$(function()
{

    $('.btn-alert').on('click', function(event)
	{

		if($(event.target).attr('id')=='alert1')
		{
	//	alert('alert1 clicked');
		var type = 'success';
		var message = 'Operacion realizada correctamente';
    var img = 'img/ok.png';
    var t = '¡Hecho!';
		//
		}
		else if($(event.target).attr('id')=='alert2')
		{
		var type = 'danger';
		var message = 'Hubo un problema';
    var img = 'img/alert.png';
    var t = 'Error';
		}
    var alertType = 'alert-'+ type;

       // alert('alert type is: '+ alertType);
        var htmlAlert = '<div class="alert '+ alertType +'" style="text-align:center; width:130px; height:150px; position:absolute; top:0; left:0; margin-left:50%;"><img src="'+img+'" height="40" width="40"><h3>'+ t +'<h3><BR><p></p></div>';
       // alert(htmlAlert);
        $(".alert-message").prepend(htmlAlert);
        $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });
	});
});
