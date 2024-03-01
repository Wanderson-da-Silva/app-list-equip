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
    <li class="list-group-item  d-flex justify-content-between aling-items-center">  {{$equipamento->nome}} 
    <div class="aling-items-center d-flex justify-content-between">
    <form action="{{ route('equipamento.deletar', $equipamento->id ) }}" method="post" class="ms-2">
    @csrf
            <button class="btn btn-dark mb-2">x</button>
        </form>
        
        <a href="{{ route('equipamento.editar', $equipamento->id )}}" class="btn btn-danger btn-sm">Editar</a>
        </div>
        </li>
    @endforeach
    @endisset
    

</ul>
</div>
</x-layoutPadrao>