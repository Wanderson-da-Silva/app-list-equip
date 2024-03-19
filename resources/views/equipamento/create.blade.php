<x-layoutPadrao title="Novo Equipamento">
<style>
        
        #custom-button {
  width: 100px;
  height: 40px;
  background-color: #44aec3;
  color: white;
  border: none;
  border-radius: 20px;
  position: relative;
}
#custom-button.clicked {
  width: 100px;
  height: 40px;
  background-color: #6e7b89;
  color: white;
  border: none;
  border-radius: 20px;
  position: relative;
}

#custom-button::before {
  content: "";
  width: 20px;
  height: 20px;
  background-color:#c3c9cf;
  border-radius: 50%;
  position: absolute;
  top: 10px;
  left: 10px;
  transition: left 0.3s ease;
}

#custom-button.clicked::before {
  left: 70px;
}

    </style>
  <a href="/equipamento" class="btn btn-dark mb-2">Voltar</a>
  <form action="{{route('equipamento.salvar')}}" method="post">
    <!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
    @csrf

    <div class="row mb-3">
      <div class="col-5">
        <labe class="form-label" for="nome"> Nome: </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ null !== old('nome')?old('nome'): null }}" maxlength="55">

      </div>
      
      <div class="col-3">
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
      <div class="col-3">
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
      <!-- Crie o botão -->
      <button id="custom-button" type="button">Ativo</button>
      <input type="hidden" id="status" name="status" />
    <script>
        const button = document.getElementById("custom-button");
        const checkbox = document.getElementById("status");
button.addEventListener("click", () => {
  button.classList.toggle("clicked");
  if (button.classList.contains("clicked")) {
      button.textContent = "Inativo";
      checkbox.value = false;
    } else {
      button.textContent = "Ativo";
      checkbox.value = true;
    }
});
    </script>
    </div>

    <input type="hidden" id="id" name="id" @isset($id) value="{{$id}}" @endisset>
    <button type="submit" class="btn btn-primary"> Salvar</button>
  </form>


</x-layoutPadrao>