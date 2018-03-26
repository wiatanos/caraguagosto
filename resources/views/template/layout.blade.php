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
	<div class="container">
		@if (count($errors) > 0)
		    <div class="alert alert-danger mt-3">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		@if (session('status'))
		    <div class="alert alert-success mt-3">
		        {{ session('status') }}
		    </div>
		@endif
		@yield('conteudo')
	</div>

		<script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/js/validator/dist/jquery.validate.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/js/validator/dist/additional-methods.js') }}"></script>
		<script type="text/javascript" src="{{asset('assets/js/validator/src/localization/messages_pt_BR.js') }}"></script>
		<script type="text/javascript" src="{{asset('assets/js/validacao.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
		<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	@yield('js')
</body>
</html>