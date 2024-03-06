<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcasFormRequest;
use App\Models\Fornecedor;
use App\Models\Marca;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcasController extends Controller
{
  public function index(Request $request)
  {
    $marcas = Marca::all();

    // verificando se mensagem existe na sessao
    if (null !== $request->session()->get('mensagem.sucesso') || null !== $request->session()->get('mensagem.erro')) {
      $mensagemSucesso = $request->session()->get('mensagem.sucesso');
      $mensagemErro = $request->session()->get('mensagem.erro');
      if (null === $mensagemSucesso) {
        return  view('marca.index')->with('marcas', $marcas)->with('mensagemErro', $mensagemErro);
      } else {
        return view('marca.index')->with('marcas', $marcas)->with('mensagemSucesso', $mensagemSucesso);
      }
    }

    return view('marca.index')->with('marcas', $marcas);
  }

  public function create()
  {

    return view('marca.create');
  }

  public function store(MarcasFormRequest $request)
  {
    try {
      DB::beginTransaction();
      $marca = Marca::create($request->all());
      DB::commit();

      return to_route('marcas.listar')
        ->with('mensagem.sucesso', "Marca '{$marca->nome}' adicionada com sucesso");
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('marcas.listar')
        ->with('mensagem.erro', "Marca '{$request->nome}' não adicionada. Erro !");
    }
  }

  public function destroy(Marca $marca)
  {
    try {
      DB::beginTransaction();
      $marca->delete();
      DB::commit();

      return to_route('marcas.listar')
        ->with('mensagem.sucesso', "Marca '{$marca->nome}' removida com sucesso");
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('marcas.listar')
        ->with('mensagem.erro', "Marca '{$marca->nome}' não excluida. Erro !");
    }
  }

  public function edit(Request $request)
  {

    $id = $request->marca;

    try {
      DB::beginTransaction();
      $res = Marca::find($id);
      DB::commit();

      return view('marca.edit')->with('res', $res);
    } catch (\Throwable $th) {

      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('marcas.listar')
        ->with('mensagem.erro', "Marca de ID '{$id}' não encontrado. Erro !");
    }
  }

  public function update(MarcasFormRequest $request)
  {
    // dd($request->all());

    try {
      DB::beginTransaction();
      $res = Marca::find($request->id);

      //$equipamento->fill($request->all());
      //$equipamento->update();

      $res->update($request->all());
      DB::commit();
      return to_route('marcas.listar')
        ->with('mensagem.sucesso', "Marca '{$request->nome}' atualizada com sucesso");

      
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('marcas.listar')
        ->with('mensagem.erro', "Marca de ID '{$request->id}' não encontrada ou erro na atualização. Erro !");
    }
  }
}
