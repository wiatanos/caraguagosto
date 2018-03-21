@extends('template.layout')
@section('titulo', 'Restaurantes')
@section('conteudo')
<div class="row">
	<div class="col-12" style="margin-top: 20px;">
		<h5 class="text-center">Cadastro de Restaurante</h5>
	</div>
	<div class="col-12 shadow" style="padding: 10px;">
		{{Form::open(['url' => $data['url']])}}
			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				@if(isset($data['nome']))<input type="hidden" name="id" value="{{ $data['id'] }}">@endif
				{{ Form::text('nome', isset($data['nome'])? $data['nome'] :null, ['class' => 'form-control', 'placeholder' => 'Nome do Restaurante...'])}}
			</div>

			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				{{ Form::hidden('codigo_old', isset($data['nome'])? $data['codigo'] :null, [])}}
				{{ Form::text('codigo', isset($data['nome'])? $data['codigo'] :null, ['class' => 'form-control', 'placeholder' => 'Código do Restaurante...'])}}
			</div>

			<div class="input-group form-group">
				{{ Form::submit(isset($data['nome'])? 'Atualizar' : 'Cadastrar', ['class' => 'form-control btn btn-success']) }}
			</div>

		{{ Form::close() }}
	</div>
</div>
@endsection