@extends('layout')
@section('pagina_titulo', $categoria->nome)

@section('pagina_conteudo')

<div class="container">
	<div class="row">
		<h3>{{ $categoria->nome }}</h3>
        <hr/>
		
		@if ($categoria->categoriaProdutos)
			<h3>Produtos</h3>

			@foreach($categoria->categoriaProdutos as $produto)
				<div class="col s12 m6 l4">
					<div class="card medium">
						<div class="card-image">
							<img src="{{URL::asset('/image/uploads/produtos/')}}/{{ $produto->produto->imagem }}">
						</div>
						
						<div class="card-content">
							<span class="card-title grey-text text-darken-4 truncate" title="{{ $produto->produto->nome }}">
								{{ $produto->produto->nome }}
							</span>
							<p>R$ {{ number_format($produto->produto->preco, 2, ',', '.') }}</p>
						</div>

						<div class="card-action">
							<a class="blue-text" href="{{ route('produto', $produto->produto->id) }}">Veja mais</a>
						</div>
					</div>
				</div>
			@endforeach
		@endif
	</div>
</div>

@endsection