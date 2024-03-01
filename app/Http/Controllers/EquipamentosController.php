<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipamentosFormRequest;
use App\Models\Fornecedor;
use App\Models\Marca;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipamentosController extends Controller
{
  public function index(Request $request)
  {
    $equipamentos = Equipamento::all();

    // verificando se mensagem existe na sessao
    if (null !== $request->session()->get('mensagem.sucesso') || null !== $request->session()->get('mensagem.erro')) {
      $mensagemSucesso = $request->session()->get('mensagem.sucesso');
      $mensagemErro = $request->session()->get('mensagem.erro');
      if (null === $mensagemSucesso) {
        return  view('equipamento.index')->with('equipamentos', $equipamentos)->with('mensagemErro', $mensagemErro);
      } else {
        return view('equipamento.index')->with('equipamentos', $equipamentos)->with('mensagemSucesso', $mensagemSucesso);
      }
    }

    return view('equipamento.index')->with('equipamentos', $equipamentos);
  }

  public function create()
  {
    return view('equipamento.create');
  }

  public function store(EquipamentosFormRequest $request)
  {
    try {
      DB::beginTransaction();
      $equip = Equipamento::create($request->all());
      DB::commit();

      return to_route('equipamentos.listar')
        ->with('mensagem.sucesso', "Equipamento '{$equip->nome}' adicionada com sucesso");
    } catch (\Throwable $th) {
      DB::rollback();
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento '{$equip->nome}' não adicionada. Erro: '{$th}'");
    }
  }

  public function destroy(Equipamento $equipamento)
  {
    $equipamento->delete();

    return to_route('equipamentos.listar')
      ->with('mensagem.sucesso', "Equipamento '{$equipamento->nome}' removido com sucesso");
  }

  public function edit(Request $request)
  {

    $nomeAnim = $request->equipamento;

    $res = Equipamento::find($nomeAnim);

    return view('equipamento.edit')->with('res', $res);
  }

  public function update(Equipamento $equipamento, EquipamentosFormRequest $request)
  {
    // dd($request->all());
    $res = Equipamento::find($request->id);


    //$equipamento->fill($request->all());
    //dd($equipamento);

    $res->update($request->all());
    //$equipamento->update();

    return to_route('equipamentos.listar')
      ->with('mensagem.sucesso', "Equipamento '{$request->nome}' atualizado com sucesso");
  }
}
