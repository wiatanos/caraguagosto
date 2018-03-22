@extends('template.layout')
@section('titulo', 'Restaurantes')
@section('conteudo')
<div class="row">
	<div class="col-12">
	</div>
	<div class="col-12 card mt-5">
		<div class="card-body">
		<h5 class="text-center card-title">Cadastro de Categoria</h5>

		{{Form::open(['url' => $data['url']])}}

			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				@if(isset($data['nome']))<input type="hidden" name="id" value="{{ $data['id'] }}">@endif
				{{ Form::text('nome', isset($data['nome'])? $data['nome'] :null, ['class' => 'form-control', 'placeholder' => 'Nome da Categoria...'])}}
			</div>

			<div class="input-group form-group">
				{{ Form::submit(isset($data['nome'])?'Atualizar':'Cadastrar', ['class' => 'form-control btn btn-success']) }}
			</div>

		{{ Form::close() }}
		</div>
	</div>
</div>
@endsection