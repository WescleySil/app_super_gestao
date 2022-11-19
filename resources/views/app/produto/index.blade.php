@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produtos.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Detalhes</th>
                            <th>Aapagar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? ''}}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                <td>
                                    <form id="delete" action="{{route('produtos.destroy', ['produto' =>$produto->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('delete').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('produtos.edit', ['produto' => $produto->id])}}">Editar</a></td>
                                <td><a href="{{route('produtos.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                                @if(isset($produto->produtoDetalhe->comprimento))
                                <td><a href="{{route('produto-detalhe.edit', ['produto_detalhe' => $produto->produtoDetalhe->id])}}">Editar Detalhes</a></td>
                                <td> <form action="{{route('produto-detalhe.destroy', ['produto_detalhe' => $produto->produtoDetalhe])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Apagar Detalhes</button>
                                </form></td>
                                @else
                                <td><a href="{{route('produto-detalhe.create', ['produto' => $produto->id])}}">Adicionar Detalhes</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links() }}

                <!--
                <br>
                {{ $produtos->count() }} - Total de registros por página
                <br>
                {{ $produtos->total() }} - Total de registros da consulta
                <br>
                {{ $produtos->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $produtos->lastItem() }} - Número do último registro da página

                -->
                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>

    </div>

@endsection
