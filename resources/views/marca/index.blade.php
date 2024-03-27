<x-layoutPadrao title="Marca">
<div>
<a href="{{route('marca.criar')}}" class="btn btn-dark mb-2">Adicionar</a>

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
    @isset($marcas)
    @foreach($marcas as $marca) 
    <li class="list-group-item">  {{$marca->nome}} 
    <div class="button-list col-md-3">
    <form action="{{ route('marca.deletar', $marca->id ) }}" method="post" class="md-2">
    @csrf
            <button class="btn btn-dark md-2">x</button>
        </form>
        
        <a href="{{ route('marca.editar', $marca->id )}}" class="btn btn-danger md-2">Editar</a>
        </div>
        </li>
    @endforeach
    @endisset
    

</ul>
</div>
</x-layoutPadrao>