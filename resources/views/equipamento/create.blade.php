
<x-layoutPadrao title="Novo Equipamento">
<form action="{{route('equipamento.salvar')}}" method="post">
<!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
  @csrf

  <div class="row mb-3">
    <div class="mb-3 col-8">
    <labe  class="form-label" for="nome"> Nome: </label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ null !== old('nome')?old('nome'): null }}" >
    
    </div>
    <div class="col-2">
  <label class="form-label">ID marca:</label>
  <input class="form-control" type="text" name="id_marca" id="id_marca" />
  </div>
  <div class="col-2">
    <label class="form-label">ID fornecedor:</label>
  <input class="form-control" type="text" name="id_fornecedor" id="id_fornecedor" />
  </div>
  </div>

    <input type="hidden" id="id" name="id" @isset($id) value="{{$id}}" @endisset>
    <button type="submit" class="btn btn-primary"> Salvar</button>
</form>


</x-layoutPadrao>  