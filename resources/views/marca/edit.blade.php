<x-layoutPadrao title="Editar Marca">
  <a href="/marca" class="btn btn-dark mb-2">Voltar</a>

  <form action="{{route('marca.atualizar')}}" method="post">
    @csrf
    <div class="row mb-3">
      <div class="mb-3 col-8">
        <labe class="form-label" for="nome"> Nome: </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ $res->nome }}">

      </div>
      
    </div>

    <input type="hidden" id="id" name="id" value="{{$res->id}}">
    <button type="submit" class="btn btn-primary"> Salvar</button>


  </form>
</x-layoutPadrao>