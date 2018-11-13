@extends('layout')
@section('pagina_titulo', 'Carrinho' )

@section('pagina_conteudo')

<div class="container carrinho">
    <div class="row">
        <h3>Meu Carrinho</h3>
        <hr/>
        
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">
                <strong>{{ Session::get('mensagem-sucesso') }}</strong>
            </div>
        @endif
        
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">
                <strong>{{ Session::get('mensagem-falha') }}</strong>
            </div>
        @endif

        @if ($itens)
            <table>
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPedido = 0;
                    @endphp
                    
                    @foreach ($itens as $id => $item)
                        <tr data-carrinho-item="{{ $id }}">
                            <td>
                                <img src="{{URL::asset('/image/uploads/produtos/')}}/{{ $item['imagem'] }}">
                            </td>
                            <td class="center-align">

                                <div class="carrinho-quantidade">
                                    <a 
                                        href="{{ route('carrinho.quantidade', ['id' => $id]) }}" 
                                        class="carrinho-setas aumentar" 
                                        data-carrinho-quantidade="1"></a>

                                    <a 
                                        href="{{ route('carrinho.quantidade', ['id' => $id]) }}" 
                                        class="carrinho-setas diminuir" 
                                        data-carrinho-quantidade="0"></a>

                                    <input type="text" value="{{ $item['quantidade'] }}" data-carrinho-quantidade-input>          
                                </div>

                                <a 
                                    href="#" 
                                    class="tooltipped" 
                                    data-position="right" 
                                    data-delay="50" 
                                    data-tooltip="Retirar produto do carrinho?">Retirar produto
                                </a>
                            </td>

                            <td> {{ $item['nome'] }} </td>
                            
                            <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                            
                            @php
                                $totalProduto = $item['preco'] * $item['quantidade'];
                                $totalPedido += $totalProduto;
                            @endphp
                            
                            <td data-carrinho-produto-total>R$ {{ number_format($totalProduto, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row">
                <strong class="col offset-l6 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                
                <span class="col l2 m2 s2" data-carrinho-pedido-total>
                    R$ {{ number_format($totalPedido, 2, ',', '.') }}
                </span>
            </div>
            
            <div class="row">
                <a 
                    class="btn-large tooltipped col l4 s4 m4 offset-l2 offset-s2 offset-m2" 
                    data-position="top" 
                    data-delay="50" 
                    data-tooltip="Voltar a página inicial para continuar comprando?" 
                    href="{{ route('index') }}">
                    Continuar comprando
                </a>
                
                <form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn-large blue col offset-l1 offset-s1 offset-m1 l5 s5 m5 tooltipped" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                        Concluir compra
                    </button>   
                </form>
            </div>
        @else
            <h5>Não há nenhum pedido no carrinho</h5>
        @endif
    </div>
</div>

@push('scripts')
@endpush

@endsection