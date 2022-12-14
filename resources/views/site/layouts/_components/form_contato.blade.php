{{$slot}}

<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input name="nome" value="{{old('nome')}}" id="nome" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{old('telefone')}}" id="telefone" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{old('email')}}" id="email" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem">{{old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- <div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
    <pre>
        {{print_r($errors)}}
    </pre>
</div> --}}
