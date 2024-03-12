<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedoresFormRequest;
use App\Models\Fornecedor;
use App\Models\Marca;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedoresController extends Controller
{
  public function index(Request $request)
  {
    $forns = Fornecedor::all();

    // verificando se mensagem existe na sessao
    if (null !== $request->session()->get('mensagem.sucesso') || null !== $request->session()->get('mensagem.erro')) {
      $mensagemSucesso = $request->session()->get('mensagem.sucesso');
      $mensagemErro = $request->session()->get('mensagem.erro');
      if (null === $mensagemSucesso) {
        return  view('fornecedor.index')->with('forns', $forns)->with('mensagemErro', $mensagemErro);
      } else {
        return view('fornecedor.index')->with('forns', $forns)->with('mensagemSucesso', $mensagemSucesso);
      }
    }

    return view('fornecedor.index')->with('forns', $forns);
  }

  public function create()
  {

    return view('fornecedor.create');
  }

  public function store(FornecedoresFormRequest $request)
  {
    try {
      DB::beginTransaction();

      $dadosFornecedor = $request->only(['nome', 'CNPJ']);

      $forn = Fornecedor::create($dadosFornecedor);
      DB::commit();

      return to_route('fornecedores.listar')
        ->with('mensagem.sucesso', "Fornecedor '{$forn->nome}' adicionado com sucesso");
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('fornecedores.listar')
        ->with('mensagem.erro', "Fornecedor '{$request->nome}' não adicionado. Erro !");
    }
  }

  public function destroy(Fornecedor $fornecedor)
  {
    try {
      DB::beginTransaction();
      $fornecedor->delete();
      DB::commit();

      return to_route('fornecedores.listar')
        ->with('mensagem.sucesso', "Fornecedor '{$fornecedor->nome}' removido com sucesso");
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('fornecedores.listar')
        ->with('mensagem.erro', "Fornecedor '{$fornecedor->nome}' não excluido. Erro !");
    }
  }

  public function edit(Request $request)
  {

    $id = $request->fornecedor;

    try {
      DB::beginTransaction();
      $res = Fornecedor::find($id);
      DB::commit();

      return view('fornecedor.edit')->with('res', $res);
    } catch (\Throwable $th) {

      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('fornecedores.listar')
        ->with('mensagem.erro', "Fornecedor de ID '{$id}' não encontrado. Erro !");
    }
  }

  public function update(FornecedoresFormRequest $request)
  {
    // dd($request->all());

    try {
      DB::beginTransaction();
      $res = Fornecedor::find($request->id);

      //$equipamento->fill($request->all());
      //$equipamento->update();

      $res->update($request->all());
      DB::commit();
      return to_route('fornecedores.listar')
        ->with('mensagem.sucesso', "Fornecedor '{$request->nome}' atualizado com sucesso");

      
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('fornecedores.listar')
        ->with('mensagem.erro', "Fornecedor de ID '{$request->id}' não encontrado ou erro na atualização. Erro !");
    }
  }
}
