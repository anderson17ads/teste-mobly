@extends('layout')
@section('pagina_titulo', 'HOME')

@section('pagina_conteudo')

<div class="container">
	<div class="row">
		@foreach($produtos as $produto)
			<div class="col s12 m6 l4">
				<div class="card medium">
					<div class="card-image">
						<img src="{{ $produto->imagem }}">
					</div>
					
					<div class="card-content">
						<span class="card-title grey-text text-darken-4 truncate" title="{{ $produto->nome }}">
							{{ $produto->nome }}
						</span>
						<p>R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
					</div>

					<div class="card-action">
						<a class="blue-text" href="{{ route('produto', $produto->id) }}">Veja mais</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>

@endsection