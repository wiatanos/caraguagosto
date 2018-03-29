@extends('template.layout')
@section('titulo', 'Listar - '.$data["titulo"])
@include('template.nav')
@section('conteudo')
<div class="col-12 card mt-3">
	<div class="card-body">
		<table class="table table-responsive-sm thead-dark">
			<thead>
				<tr>
					@foreach($data['table']['title'] as $conteudo)
					<th>{{ $conteudo }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@if(isset($data['table']['ativos']))
				@foreach($data['table']['ativos'] as $key => $conteudo)
				<tr>
					@foreach($conteudo as $key => $value)
					<td>{{ $value }}</td>
					@endforeach
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>

		@if(isset($data['table']['inativos']))
		<table class="table table-responsive-sm thead-dark" style="boder: 1px solid red;">
			<thead>
				@foreach($data['table']['title'] as $conteudo)
				<th>{{ $conteudo }}</th>
				@endforeach
			</thead>
			<tbody>
				@foreach($data['table']['inativos'] as $key => $conteudo)
				<tr>
					@foreach($conteudo as $key => $value)
					<td>{{ $value }}</td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>
@endsection