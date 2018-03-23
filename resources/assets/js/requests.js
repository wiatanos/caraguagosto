// votacao
  $('.btn').on('click', function(e){
  	$.ajax({
	  method: "POST",
	  url: "/listar/",
	  data: $('form').serialize()
	})
	  .done(function( msg ) {
	    alert( "Data Saved: " + msg );
	  });
  })