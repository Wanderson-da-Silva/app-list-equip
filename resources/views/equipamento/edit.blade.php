<x-layoutPadrao title="Editar Equipamento">
<a href="/equipamento" class="btn btn-dark mb-2">Voltar</a>

  <form action="{{route('equipamento.atualizar')}}" method="post">
  @csrf
  <div class="row mb-3">
    <div class="mb-3 col-8">
    <labe  class="form-label" for="nome"> Nome: </label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $res->nome }}" >
    
    </div>
    <div class="col-2">
  <label class="form-label">ID marca:</label>
  <input class="form-control" type="text" name="id_marca" id="id_marca" value="{{$res->id_marca}}" />
  </div>
  <div class="col-2">
    <label class="form-label">ID fornecedor:</label>
  <input class="form-control" type="text" name="id_fornecedor" id="id_fornecedor" value="{{$res->id_fornecedor}}" />
  </div>
  </div>

  <input type="hidden" id="id" name="id" value="{{$res->id}}" >
    <button type="submit" class="btn btn-primary"> Salvar</button>


  </form>
</x-layoutPadrao>  