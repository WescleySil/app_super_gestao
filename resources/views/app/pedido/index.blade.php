@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedidos.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>

                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                                <td><a href="{{ route('pedidos.show', ['pedido' => $pedido->id ]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedidos.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('pedidos.edit', ['pedido' => $pedido->id ]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $pedidos->appends($request)->links() }}

                <!--
                <br>
                {{ $pedidos->count() }} - Total de registros por p??gina
                <br>
                {{ $pedidos->total() }} - Total de registros da consulta
                <br>
                {{ $pedidos->firstItem() }} - N??mero do primeiro registro da p??gina
                <br>
                {{ $pedidos->lastItem() }} - N??mero do ??ltimo registro da p??gina

                -->
                <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
        </div>

    </div>

@endsection

