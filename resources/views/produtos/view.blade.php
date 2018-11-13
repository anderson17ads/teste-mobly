@extends('layout')
@section('pagina_titulo', $produto->nome )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        <div class="section col s12 m6 l6">
            <img 
                class="col s12 m12 l12 materialboxed" 
                data-caption="{{ $produto->nome }}" 
                src="{{URL::asset('/image/uploads/produtos/')}}/{{ $produto->imagem }}" 
                alt="{{ $produto->nome }}" 
                title="{{ $produto->nome }}">
        </div>
        
        <div class="produto-detalhe-detalhe section col s12 m6 l6">
            <h3>{{ $produto->nome }}</h3>
            <h4> R$ {{ number_format($produto->preco, 2, ',', '.') }} </h4>
            
            <form method="POST" action="{{ route('carrinho.adicionar') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <button class="btn-large col l6 m6 s6 green accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>   
            </form>
        </div>

        <div class="produto-detalhe-descricao section col s12 m6 l6">
            <h2>Descrição</h2>
            <p>{!! $produto->descricao !!}</p>
        </div>
    </div>
</div>
@endsection