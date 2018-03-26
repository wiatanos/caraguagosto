@extends('template.layout')
@section('titulo', 'Restaurantes')
@extends('template.nav')
@section('conteudo')
<div class="row">
	<div class="col-12 mt-5">
		<div class="card">
			<h5 class="text-center card-header">Cadastro de Prato</h5>

			<div class="col-12 card-body">

				{{Form::open(['url' => $data['url']])}}
				<div class="input-group form-group">
					<div class="input-group-addon"><i class="far fa-user"></i></div>
					@if(isset($data['prato']))<input type="hidden" name="id" value="{{ $data['id'] }}">@endif
					{{ Form::text('nome', isset($data['prato'])? $data['prato'] :null, ['class' => 'form-control', 'placeholder' => 'Nome do Prato...'])}}
				</div>

				<div class="input-group form-group">
					<div class="input-group-addon"><i class="far fa-user"></i></div>
					{{ Form::select('restaurante_id', $data['restaurantes'], isset($data['restaurante']) ? $data['restaurante']:null, ['class' => 'form-control', 'placeholder' => 'Selecione o restaurante'])}}
				</div>

				<div class="input-group form-group">
					<div class="input-group-addon"><i class="far fa-user"></i></div>
					{{ Form::select('categoria_id', $data['categorias'], isset($data['categoria'])? $data['categoria']:null, ['class' => 'form-control', 'placeholder' => 'Selecione a categoria'])}}
				</div>

				<div class="input-group form-group">
					{{ Form::submit('Cadastrar', ['class' => 'form-control btn btn-success']) }}
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection