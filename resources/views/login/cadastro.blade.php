<x-layoutPadrao title="cadastrar Login">
  
  <form action="{{route('login.cadastro')}}" method="post">
    <!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
    @csrf

    <div class="row mb-3">
      <div class="mb-3 col-8">
        <labe class="form-label" for="name"> Nome: </label>
          <input type="text" class="form-control" id="name" name="name" value="{{ null !== old('name')?old('name'): null }}">

      </div>
      <div class="mb-3 col-8">
        <labe class="form-label" for="email"> Email: </label>
          <input type="text" class="form-control" id="email" name="email" value="{{ null !== old('email')?old('email'): null }}">

      </div>
      <div class="mb-3 col-8">
        <labe class="form-label" for="nome"> Senha: </label>
          <input type="text" class="form-control" id="password" name="password" value="{{ null !== old('password')?old('password'): null }}">

      </div>
      
    </div>

    
    <button type="submit" class="btn btn-primary"> salvar</button>
  </form>


</x-layoutPadrao>