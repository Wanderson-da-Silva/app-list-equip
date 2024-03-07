<x-layoutPadrao title="Novo Equipamento">
  <a href="/equipamento" class="btn btn-dark mb-2">Voltar</a>
  <form action="{{route('equipamento.salvar')}}" method="post">
    <!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
    @csrf

    <div class="row mb-3">
      <div class="mb-3 col-8">
        <labe class="form-label" for="nome"> Nome: </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ null !== old('nome')?old('nome'): null }}">

      </div>
      <!-- <div class="col-2">
        <label class="form-label">ID marca:</label>
        <input class="form-control" type="text" name="id_marca" id="id_marca" />
      </div>
      <div class="col-2">
        <label class="form-label">ID fornecedor:</label>
        <input class="form-control" type="text" name="id_fornecedor" id="id_fornecedor" />
      </div> -->
      <div class="col-4">
        <label class="form-label text-right">Marca:</label>
        <select type="text" class="form-control" name="id_marca" id="id_marca">
          @isset($marcas)
          <option value="w"></option>
          @foreach($marcas as $marca)
          <option value="{{$marca->id}}">{{$marca->nome}}</option>

          @endforeach
          @endisset
          @if(null === $marcas)
          <option value="w">sem marca</option>
          @endif
        </select><br />
      </div>
      <div class="col-4">
        <label class="form-label text-right">Fornecedor:</label>
        <select type="text" class="form-control" name="id_fornecedor" id="id_fornecedor">
          @isset($forns)
          <option value="w"></option>
          @foreach($forns as $forn)
          <option value="{{$forn->id}}">{{$forn->nome}}</option>

          @endforeach
          @endisset
          @if(null === $forns)
          <option value="y">sem fornecedor</option>
          @endif
        </select><br />
      </div>
    </div>

    <input type="hidden" id="id" name="id" @isset($id) value="{{$id}}" @endisset>
    <button type="submit" class="btn btn-primary"> Salvar</button>
  </form>


</x-layoutPadrao>