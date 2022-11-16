@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('app.fornecedores.adicionar') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('app.fornecedores') }}">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{$msg}}
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action="{{route('app.fornecedores.adicionar')}}" method="POST">
                    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" name="nome" value="{{$fornecedor->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

                    <input type="text" name="site" value="{{$fornecedor->site ??old('site')}}" placeholder="Site" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : ''}}

                    <input type="email" name="email" value="{{$fornecedor->email ??old('email')}}" placeholder="Email" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : ''}}

                    <input type="text" name="uf" value="{{$fornecedor->uf ??old('uf')}}" placeholder="UF" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
