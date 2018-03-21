<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand">Caragua a Gosto</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Restaurantes <i class="fas fa-building"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ url('/') }}">Cadastrar</a>
						<a class="dropdown-item" href="{{ url('restaurante/listar') }}">Listar</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categorias <i class="fas fa-tags"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ url('categoria') }}">Cadastrar</a>
						<a class="dropdown-item" href="{{ url('categoria/listar') }}">Listar</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Pratos <i class="fas fa-utensils"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ url('prato') }}">Cadastrar</a>
						<a class="dropdown-item" href="{{ url('prato/listar') }}">Listar</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout <i class="fas fa-sign-out-alt"></i>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		@if (count($errors) > 0)
		    <div class="alert alert-danger" style="margin-top: 10px;">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		@if (session('status'))
		    <div class="alert alert-success" style="margin-top: 10px;">
		        {{ session('status') }}
		    </div>
		@endif
		@yield('conteudo')
	</div>

		<script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	@yield('js')
</body>
</html>