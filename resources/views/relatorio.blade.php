@extends('template.layout')
@section('titulo', 'Relatorio - Votações')
@extends('template.nav')

@section('conteudo')
<div class="row">
	<div class="card col-12 mt-5">
		<div class="card-header"><h5 class="text-center">Relatorio de Votações</h5></div>
		<div class="card-body">
			{{ Form::open(['url' => 'votacao/listar']) }}
			<div class="form-group input-group">
				<div class="input-group-addon">#</div>
				{{ Form::select('id', $data['codigo'], null, ['class' => 'form-control ']) }}
				{{ Form::button('Resultados', ['class' => 'btn btn-primary']) }}
			</div>
			{{ Form::close() }}
			<div id="resultado"></div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('assets/js/requests.js') }}"></script>

<script type="text/javascript">

	

	$(document).ready(function(){
		$(document).bind('DOMNodeInserted', function(event){
			var page = $(event.target).find('a').attr('href');
			console.log($(event.target.nodeName))
			$(event.target).find('li').addClass('page-item').find('span, a').addClass('page-link');
			$(event.target).find('a').removeAttr('href');
		})
	
	})

	$('body').on('click', 'a.page-link', function(event) {
			$.ajax({
				method: "get",
				url: page+'&id='+$('input[name="id"]').val(),
			})
			.done(function( msg ) {
				$('#resultado').html(msg);
			});
		});




</script>
@endsection