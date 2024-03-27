<x-layoutPadrao title="Equipamento">
<div>
<a href="{{route('equipamento.criar')}}" class="btn btn-dark mb-2">Adicionar</a>

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
    @isset($equipamentos)
    @foreach($equipamentos as $equipamento) 
    
    <li class="list-group-item">  {{$equipamento->nome}} 
    <div class="button-list col-md-3">
    <form action="{{ route('equipamento.deletar', $equipamento->id ) }}" method="post" class="md-2">
    @csrf
            <button class="btn btn-dark md-2">x</button>
        </form>
        
        <a href="{{ route('equipamento.editar', $equipamento->id )}}" class="btn btn-danger md-2">Editar</a>
        </div>
        </li>
    @endforeach
    @endisset
    

</ul>
</div>
</x-layoutPadrao>