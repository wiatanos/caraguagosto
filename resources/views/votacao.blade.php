@extends('template.layout')
@section('title', 'Votação')

@section('conteudo')
<div class="row">
	<div class="col-12 mt-3">
		<div class="card">
			<div class="card-header text-center">Votação<br><p class="text-center"><img class="card-img text" src="assets/img/gosto.png" style="height: 100px; width: 100px;"></p></div>
			
			<div class="col-12 card-body">
				<form class="form-row">
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
								<input class="form-control" type="text" name="nome" placeholder="Nome...">
							</div>

							<div class="input-group form-group">
								<div class="input-group-addon"><i class="far fa-envelope"></i></div>
								<input class="form-control" type="text" name="email" placeholder="E-Mail...">
							</div>

							<div class="input-group form-group">
								<div class="input-group-addon"><span class="far fa-id-card"></span></div>
								<input class="form-control" type="number" name="cpf" placeholder="CPF...">
							</div>
						</div>

						<div class=" col-12 tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="input-group form-group">
								<div class="input-group-addon"><i class="fas fa-utensils"></i></div>
								<input class="form-control mySearch" id="ls_query" type="text" name="codigo" placeholder="Codigo do Restaurante">
							</div> 
							<div class="input-group form-group">
								<div class="input-group-addon"><i class="fas fa-utensils"></i></div>
								<input class="form-control mySearch" id="ls_query" type="number" maxlength="2" max="10" name="codigo" placeholder="Apresentação do Prato">
							</div> 

							<div class="input-group form-group">
								<div class="input-group-addon"><i class="fas fa-utensils"></i></div>
								<input class="form-control mySearch" id="ls_query" type="number" max="10" name="codigo" placeholder="Sabor do Prato">
							</div> 

							<div class="input-group form-group">
								<div class="input-group-addon"><i class="fas fa-utensils"></i></div>
								<input class="form-control mySearch" id="ls_query" type="number" max="10" name="codigo" placeholder="Ambiente">
							</div>

							<div class="float-right">
								<button class="btn btn-success">Votar!</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection