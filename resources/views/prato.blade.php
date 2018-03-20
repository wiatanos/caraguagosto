@extends('template.layout')
@section('titulo', 'Restaurantes')
@section('conteudo')
<div class="row">
	<div class="col-12" style="margin-top: 20px;">
		<h5 class="text-center">Cadastro de Prato</h5>
	</div>
	<div class="col-12 shadow" style="padding: 10px;">
		{{Form::open(['url' => $data['url']])}}
			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				{{ Form::text('nome', isset($data['nome'])? $data['nome'] :null, ['class' => 'form-control', 'placeholder' => 'Nome do Prato...'])}}
			</div>

			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				{{ Form::select('pratos', ['0' => 'Selecione uma Categoria','1' => 'Gourmet'], null, ['class' => 'form-control'])}}
			</div>

			<div class="input-group form-group">
				{{ Form::submit('Cadastrar', ['class' => 'form-control btn btn-success']) }}
			</div>

		{{ Form::close() }}
	</div>
</div>
@endsection