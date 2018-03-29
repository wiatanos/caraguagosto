@extends('template.layout')
@section('title', 'Votação')

@section('conteudo')
<div class="row">
	<div class="col-12 mt-3">
		<div class="card">
			<div class="card-header text-center">Votação<br><p class="text-center"><img class="card-img text" src="assets/img/gosto.png" style="height: 100px; width: 100px;"></p></div>
			<div class="col-12 card-body">
				{{Form::open(['url' => 'votacao/insert', 'id' => 'form'])}}
				<ul class="col-12 nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
							<i class="far fa-address-card"></i><br>
							Dados Pessoais
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
							<i class="far fa-comment-alt"></i><br>
							Notas
						</a>
					</li>
				</ul>

				<div class="col-12 tab-content" id="v-pills-tabContent">
					<div class="col-12 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<div class="input-group form-group">
							<div class="input-group-addon"><i class="far fa-user"></i></div>
							{{ Form::text('nome', null, ['class' => 'form-control required', 'placeholder' => 'Nome...']) }}
						</div>

						<div class="input-group form-group">
							<div class="input-group-addon"><i class="far fa-envelope"></i></div>
							<input class="form-control required email" type="text" name="email" placeholder="E-Mail...">
						</div>

						<div class="input-group form-group">
							<div class="input-group-addon"><span class="far fa-id-card"></span></div>
							<input class="form-control required" type="text" name="cpf" placeholder="CPF...">
						</div>
					</div>

					<div class=" col-12 tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						<div class="input-group form-group">
							<div class="input-group-addon required"><i class="fas fa-utensils"></i></div>
							{{ Form::select('restaurante_codigo', $data['codigo'], null, ['class' => 'form-control', 'placeholder' => 'Escolha o restaurante']) }}
						</div>

						<h5 class="text-center load d-none"><img src="{{ asset('assets/img/svg/load.svg') }}"></h5>

						<div class="input-group form-group">
							<div class="input-group-addon"><i class="fas fa-utensils"></i></div>
							<input class="form-control required" type="number" max="10" name="ambiente" placeholder="Ambiente">
						</div>

						<div class="float-right">
							<button class="btn btn-success">Votar!</button>
						</div>
					</div>
				</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$('select[name="restaurante_codigo"]').on('change', function(e){
  	$('.load').removeClass('d-none');

		var element = $(this);
		var newDiv = '<div class="prato"><p class="text-center">Prato</p>'+
		'<div class="input-group form-group">'+
		'<div class="input-group-addon"><i class="fas fa-utensils"></i></div>'+
		'{{ Form::select('prato_id[]', [], null, ['class' => 'col-12 form-control', 'readonly', 'true']) }}'+
		'</div>'+
		'<div class="input-group form-group">'+
		'<div class="input-group-addon"><i class="fas fa-utensils"></i></div>'+
		'{{ Form::text('sabor[]', null, ['class' => 'form-control required number max-5', 'placeholder' => 'Sabor']) }}'+
		'</div>'+
		'<div class="input-group form-group">'+
		'<div class="input-group-addon"><i class="fas fa-utensils"></i></div>'+
		'{{ Form::text('apresentacao[]', null, ['class' => 'form-control required number max-5', 'placeholder' => 'Apresentação']) }}'+
		'</div><hr>';

		$('.prato').remove();
		$.ajax({
			method: "get",
			url: 'prato/get/'+$('select[name="restaurante_codigo"]').val(),
		})
		.done(function( msg ) {
			$('.load').addClass('d-none');
			$.each(msg, function(i, e){
				element.parent().after(newDiv);
				$('.prato').hide();
				element.parents().find('.prato').find('select').first().append('<option value="'+i+'" selected>'+e+'</option>');
				$('.prato').fadeIn(500)
			})
		});
	})
</script>
@endsection