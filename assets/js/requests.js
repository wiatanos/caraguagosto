// votacao
$('.btn').on('click', function(e){

	$.ajax({
		method: "POST",
		url: "listar",
		data: $('form').serialize()
	})
	.done(function( msg ) {
		$('#resultado').html(msg);
	});
})

  // pagination

  // $('body').on('click', 'a.page-link', function(event) {
  // 	$.ajax({
  // 		method: "get",
  // 		url: page+'&id='+$('input[name="id"]').val(),
  // 	})
  // 	.done(function( msg ) {
  // 		$('#resultado').html(msg);
  // 	});
  // });

  // restraurante > prato
