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
    <li class="list-group-item  d-flex justify-content-between aling-items-center">  {{$forn->nome}} 
    <div class="aling-items-center d-flex justify-content-between">
    <form action="{{ route('fornecedor.deletar', $forn->id ) }}" method="post" class="ms-2">
    @csrf
            <button class="btn btn-dark mb-2">x</button>
        </form>
        
        <a href="{{ route('fornecedor.editar', $forn->id )}}" class="btn btn-danger btn-sm">Editar</a>
        </div>
        </li>
    @endforeach
    @endisset
    

</ul>
</div>
</x-layoutPadrao>