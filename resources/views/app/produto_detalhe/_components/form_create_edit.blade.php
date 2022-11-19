@if(isset($produtoDetalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produtoDetalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
        @csrf
@endif
    <input type="text" name="produto_id" value="{{ ($produtoDetalhe->produto_id ?? request()->produto) ?? old('produto_id') }}" placeholder="Produto ID" class="borda-preta">
    {{ $errors->has('produto_id') ? $errors->first('nome') : '' }}

    <input type="text" name="comprimento" value="{{ $produtoDetalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

    <input type="text" name="largura" value="{{ $produtoDetalhe->largura ?? old('largura') }}"  placeholder="Largura" class="borda-preta">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}

    <input type="text" name="altura" value="{{ $produtoDetalhe->altura ?? old('altura') }}"  placeholder="Altura" class="borda-preta">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}

    <select name="unidade_id">
        <option>-- Selecione a Unidade de Medida --</option>

        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produtoDetalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    @if (isset($produtoDetalhe->id))
    <button type="submit" class="borda-preta">Atualizar</button>
    @else
    <button type="submit" class="borda-preta">Cadastrar</button>
    @endif

<form>
