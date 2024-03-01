
<form action="{{$action}}" method="post">
<!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
  @csrf
    <div class="mb-3 col-8">
    <labe  class="form-label" for="nome"> Nome: </label>
    <input type="text" class="form-control" id="nome" name="nome" @isset($nome) value="{{$nome}}" @endisset >
    </div>
    <input type="hidden" id="id" name="id" @isset($id) value="{{$id}}" @endisset>
    <button type="submit" class="btn btn-primary"> Salvar</button>
</form>