@extends('template.layout')
@section('titulo', 'Listar - {{ $data["titulo"] }}')

@section('conteudo')
	<table class="table">
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
@endsection