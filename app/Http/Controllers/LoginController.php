<?php

namespace App\Http\Controllers;

use App\Repositorios\LoginRepositorio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct(private LoginRepositorio $logReposit)
    {
    }
    public function index(Request $request)
    {
      
      return view('login.index');
    }


  public function logar(Request $request)
  {
    
    if(!Auth::attempt($request->only(['email','password']))){
        return redirect()->back()->withErrors(['Usuaio não cadastrado!']);
    }
    return to_route('equipamentos.listar');
    //return "tentando!";
  }

  public function cadastroindex(Request $request)
  {
    
    return view('login.cadastro');
  }
  public function cadastro(Request $request)
  {
    $dadoslogin =$request->only(['email','password','name']);
    $dadoslogin['password']= Hash::make($dadoslogin['password']);
    $equipa = $this->logReposit->add($dadoslogin);

    Auth::login($equipa);

    return view('equipamentos.listar');
  }

  public function destroy()
  {

   
  }


}
