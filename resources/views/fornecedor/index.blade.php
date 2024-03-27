<x-layoutPadrao title="Fornecedor">
<div>
<a href="{{route('fornecedor.criar')}}" class="btn btn-dark mb-2">Adicionar</a>

@isset($mensagemSucesso)
<div class="alert alert-success">
    {{ $mensagemSucesso }}
</div>
@endisset

@isset($mensagemErro)
<div class="alert alert-error">
    {{ $mensagemErro }}
</div>
@endisset

<ul class="list-group">
    @isset($forns)
    @foreach($forns as $forn) 
    <li class="list-group-item">  {{$forn->nome}} 
    <div class="button-list col-md-3">
    <form action="{{ route('fornecedor.deletar', $forn->id ) }}" method="post" class="md-2">
    @csrf
            <button class="btn btn-dark md-2">x</button>
        </form>
        
        <a href="{{ route('fornecedor.editar', $forn->id )}}" class="btn btn-danger md-2">Editar</a>
        </div>
        </li>
    @endforeach
    @endisset
    

</ul>
</div>
</x-layoutPadrao>