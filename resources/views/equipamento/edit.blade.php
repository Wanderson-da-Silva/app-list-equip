<x-layoutPadrao title="Editar Equipamento">
  <a href="/equipamento" class="btn btn-dark mb-2">Voltar</a>

  <form action="{{route('equipamento.atualizar')}}" method="post">
    @csrf
    <div class="row mb-3">
      <div class="mb-3 col-8">
        <labe class="form-label" for="nome"> Nome: </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ $res->nome }}">

      </div>
      <div class="col-4">
        <label class="form-label text-right">Marca:</label>
        <select type="text" class="form-control" name="id_marca" id="id_marca">
          <option value="{{$res->id_marca}}">{{$res->nome_marca}}</option>
          @isset($marcas)

          @foreach($marcas as $marca)
          @if($marca->id !== $res->id_marca)
          <option value="{{$marca->id}}">{{$marca->nome}}</option>
          @endif
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

          <option value="{{$res->id_fornecedor}}">{{$res->nome_fornecedor}}</option>
          @isset($forns)

          @foreach($forns as $forn)
          @if($forn->id !== $res->id_fornecedor)
          <option value="{{$forn->id}}">{{$forn->nome}}</option>
          @endif
          @endforeach
          @endisset
          @if(null === $forns)
          <option value="y">sem fornecedor</option>
          @endif
        </select><br />
      </div>
      
    </div>

    <input type="hidden" id="id" name="id" value="{{$res->id}}">
    <button type="submit" class="btn btn-primary"> Salvar</button>


  </form>
</x-layoutPadrao>