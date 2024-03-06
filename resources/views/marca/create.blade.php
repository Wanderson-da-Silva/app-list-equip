<x-layoutPadrao title="Nova Marca">
  <a href="/marca" class="btn btn-dark mb-2">Voltar</a>
  <form action="{{route('marca.salvar')}}" method="post">
    <!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
    @csrf

    <div class="row mb-3">
      <div class="mb-3 col-8">
        <labe class="form-label" for="nome"> Nome: </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ null !== old('nome')?old('nome'): null }}">

      </div>
      
    </div>

    <input type="hidden" id="id" name="id" @isset($id) value="{{$id}}" @endisset>
    <button type="submit" class="btn btn-primary"> Salvar</button>
  </form>


</x-layoutPadrao>