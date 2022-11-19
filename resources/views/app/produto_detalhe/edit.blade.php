@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Editar Detalhes</p>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('produtos.index')}}">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">

                <h4> Produto </h4>

                <div>
                    Nome:  {{$produtoDetalhe->produto->nome}}
                </div>
                <br>
                <div>
                    Descrição: {{$produtoDetalhe->produto->descricao}}
                </div>
                <br>
                @component('app.produto_detalhe._components.form_create_edit', ['unidades'=> $unidades , 'produtoDetalhe' => $produtoDetalhe])

                @endcomponent
            </div>
        </div>

    </div>
@endsection
