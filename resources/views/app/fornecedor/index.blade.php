<h1>To aqui</h1>

@isset($fornecedores)

    @forelse($fornecedores as $indices => $fornecedores)
        <hr>
        Iteração atual: {{ $loop->iteration}}
        <br>
        Fornecedor: @{{ $fornecedores['nome']}}
        <br>
        Status: @{{ $fornecedores['status']}}
        <br>
        CNPJ: @{{$fornecedores['CNPJ'] ?? 'Não informado'}}
        <br>
        Telefone: (@{{$fornecedores['ddd'] ?? 'DDD'}}) @{{$fornecedores['telefone'] ?? 'Número de telefone'}}
        <br>
    @if($loop->first == true)
    Primeira iteração do loop
    @endif
    @if($loop->last == true)
    Última iteração do loop
    <br>
    Total de registros: {{$loop->count}}
    @endif

    @empty
        Não existem fornecedores cadastrados!
    @endforelse
    <hr>
@endisset

