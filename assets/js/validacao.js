$(document).ready(function(){
	// mask 
	$('input[name="cpf"]').mask('000.000.000-00')

	// regras
	jQuery.validator.addClassRules("number", {
		number: true,
	});

	jQuery.validator.addClassRules("max-5", {
		max: 5,
	});

	$('#form').validate({
		rules: {
			cpf:{cpfBR:true}
		},
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			element.addClass('is-invalid').removeClass('is-valid');
			error.insertAfter(element);
			element.parent().find('div.success-icon').remove();
			element.after('<div class="input-group-addon error-icon"></div>');

		},
		unhighlight: function(element){
			$(element).addClass('is-valid').removeClass('is-invalid');
			$(element).parent().find('div.error-icon').remove();
			$(element).parent().find('div.success-icon').remove();
			$(element).after('<div class="input-group-addon success-icon"></div>');
		}
	});

	$('a.nav-link').on('click', function(){
		if (!$('form').valid()) {
			return false;
		}
	})
})