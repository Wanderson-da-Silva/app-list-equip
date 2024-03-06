<x-layoutPadrao title="Editar Fornecedor">
  <a href="/fornecedor" class="btn btn-dark mb-2">Voltar</a>

  <form action="{{route('fornecedor.atualizar')}}" method="post">
    @csrf
    <div class="row mb-3">
      <div class="mb-3 col-8">
        <labe class="form-label" for="nome"> Nome: </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ $res->nome }}">

      </div>
      <div class="mb-3 col-4">
                        <label class="form-label text-right">CNPJ:</label>
                        <input type="text" class="form-control" name="CNPJ" id="CNPJ" maxlength="18"  value="{{ $res->CNPJ }}" />
      </div>
    </div>

    <input type="hidden" id="id" name="id" value="{{$res->id}}">
    <button type="submit" class="btn btn-primary"> Salvar</button>


  </form>
</x-layoutPadrao>