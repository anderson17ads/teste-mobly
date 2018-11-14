@extends('layout')
@section('pagina_titulo', 'HOME')

@section('pagina_conteudo')

<div class="container">
	<div class="row">

		<div class="home-busca col center s12 m12 l12">
			<h3>Faça sua busca pelos melhores produtos</h3>
			
			@include('busca._form_busca')
		</div>

		@foreach($produtos as $produto)
			<div class="col s12 m6 l4">
				<div class="card medium">
					<div class="card-image">
						<img src="{{URL::asset('/image/uploads/produtos/')}}/{{ $produto->imagem }}">
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