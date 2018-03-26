@extends('template.layout')
@section('titulo', 'Listar - {{ $data["titulo"] }}')
@extends('template.nav')
@section('conteudo')
<div class="col-12 card mt-3">
	<div class="card-body">
		<table class="table thead-dark">
			<tr>
				@foreach($data['table']['title'] as $conteudo)
				<td>{{ $conteudo }}</td>
				@endforeach
			</tr>
			
			@foreach($data['table']['dados'] as $key => $conteudo)
			<tr>
				@foreach($conteudo as $key => $value)
				<td>{{ $value }}</td>
				@endforeach
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection