<x-layoutPadrao title="">
  <h1 class="title-login">Login</h1>
  <form action="{{route('login.logar')}}" method="post" class="form-login">
    <!--para nao dar erro, confirma que input e do nosso formulario/projeto-->
    @csrf

    <div class="row mb-3">
      <div class="mb-3 col-md-8">
        <labe class="form-label" for="name"> Nome: </label>
          <input type="text" class="form-control" id="name" name="name" value="{{ null !== old('name')?old('name'): null }}">

      </div>
      <div class="mb-3 col-md-8">
        <labe class="form-label" for="nome"> Email: </label>
          <input type="text" class="form-control" id="email" name="email" value="{{ null !== old('email')?old('email'): null }}">

      </div>
      <div class="mb-3 col-md-8">
        <labe class="form-label" for="nome"> Senha: </label>
          <input type="text" class="form-control" id="password" name="password" value="{{ null !== old('password')?old('password'): null }}">

      </div>
      
    </div>

    <div class="button-login">

     <button type="submit" class="btn btn-primary md-2"> Entrar</button>
    <a href="{{route('login.cadastroindex')}}" class="btn btn-dark md-2">Cadastrar</a>
    </div>
   
  </form>
  

</x-layoutPadrao>