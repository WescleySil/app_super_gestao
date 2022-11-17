@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('produtos.index')}}">Voltar</a>
                </li>
                <li>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action="{{route('produtos.store')}}" method="POST">
                    <input type="hidden" name="id" value="{{$produtos->id ?? ''}}">
                    @csrf
                    <input type="text" name="nome" value="{{$produtos->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

                    <input type="text" name="descricao" value="{{$produtos->descricao ??old('descricao')}}" placeholder="Descricao" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

                    <input type="number" name="peso" value="{{$produtos->peso ??old('peso')}}" placeholder="Peso" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : ''}}

                    <select name="unidade_id">
                        <option> --- Selecione a unidade de medida ---</option>
                        @foreach ($unidades as $unidade)
                        <option value="{{$unidade->id}}" {{old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
