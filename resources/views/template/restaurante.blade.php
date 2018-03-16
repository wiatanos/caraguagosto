@extends('template.layout')
@section('titulo', 'Restaurantes')
@section('conteudo')
<div class="row">
	<div class="col-12" style="margin-top: 20px;">
		<h5 class="text-center">Cadastro de Restaurante</h5>
	</div>
	<div class="col-12 shadow">
		<form>
			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				<input type="text" name="" class="form-control" placeholder="Nome do Restaurante...">
			</div>
			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				<input type="text" name="" class="form-control" placeholder="Código do Restaurante...">
			</div>
			<div class="input-group form-group">
				<div class="input-group-addon"><i class="far fa-user"></i></div>
				<select name="" class="form-control" placeholder="Pratos...">
					<option>Pão de Batata Gourmet</option>
				</select>
			</div>
			<div class="input-group form-group">
				<button class="btn btn-success form-control">Cadastrar</button>
			</div>
		</form>
	</div>
</div>
@endsection