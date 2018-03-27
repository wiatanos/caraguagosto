@extends('template.layout')
@section('titulo', 'Restaurantes')
@extends('template.nav')
@section('conteudo')
<div class="row">
	<div class="col-12 mt-5">
		<div class="card">
			<h5 class="text-center card-header">Cadastro de Restaurante</h5>

			<div class="col-12 card-body">

				{{Form::open(['url' => $data['url'], 'id' => 'form', 'class' => 'needs-validation'])}}
				<div class="input-group form-group">
					<div class="input-group-addon"><i class="far fa-user"></i></div>
					@if(isset($data['nome']))<input type="hidden" name="id" value="{{ $data['id'] }}">@endif
					{{ Form::text('nome', isset($data['nome'])? $data['nome'] :null, ['class' => 'form-control required', 'placeholder' => 'Nome do Restaurante...'])}}
				</div>

				<div class="input-group form-group">
					<div class="input-group-addon"><i class="far fa-user"></i></div>
					{{ Form::hidden('codigo_old', isset($data['nome'])? $data['codigo'] :null, [])}}
					{{ Form::text('codigo', isset($data['nome'])? $data['codigo'] :null, ['class' => 'form-control required number', 'placeholder' => 'Código do Restaurante...'])}}
				</div>

				<div class="input-group form-group">
					{{ Form::submit(isset($data['nome'])? 'Atualizar' : 'Cadastrar', ['class' => 'form-control btn btn-success']) }}
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection