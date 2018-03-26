$(document).ready(function(){
	// mask 

	$('input[name="cpf"]').mask('000.000.000-00')
	// regras
	$('form').validate({
		rules: {
			email: {email: true},
			cpf:{cpfBR:true}
		},
		errorPlacement: function(error, element) {
			error.addClass('form-control').css({'color': 'red', 'border':'1px solid red'});
			error.insertAfter(element.parent());
		}
	});

	$('a.nav-link').on('click', function(){
		if (!$('form').valid()) {
			return false;
		}
	})

	$.each($('.required'), function(i, e){
		console.log(e)
		$(e).rules('add', {
			required: true,
		})	
	})
})