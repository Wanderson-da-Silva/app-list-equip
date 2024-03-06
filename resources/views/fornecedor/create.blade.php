<x-layoutPadrao title="Nova Fornecedor">



  <a href="/fornecedor" class="btn btn-dark mb-2">Voltar</a>
  <form action="{{route('fornecedor.salvar')}}" method="post">
    <!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
    @csrf

    <div class="row mb-3">
      <div class="mb-3 col-8">
        <labe class="form-label" for="nome"> Nome: </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ null !== old('nome')?old('nome'): null }}">

      </div>
      <div class="mb-3 col-4">
                        <label class="form-label text-right">CNPJ:</label>
                        <input type="text" class="form-control" name="CNPJ" id="CNPJ" maxlength="18" />
      </div>
      
    </div>

    <input type="hidden" id="id" name="id" @isset($id) value="{{$id}}" @endisset>
    <button type="submit" class="btn btn-primary"> Salvar</button>
  </form>

  <script language="javascript" type="text/javascript">
           var cnpjInputF = document.getElementById('CNPJ');
    

    if (cnpjInputF) {
//        alert("No campo CNPJ Fornecedor identificado !");
        cnpjInputF.addEventListener('input', function(event) {
            var input = event.target;
            var inputValue = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

            // Aplica a máscara
            var formattedValue = inputValue.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');

            // Atualiza o valor do campo
            input.value = formattedValue;
        });
    }

        </script>
</x-layoutPadrao>