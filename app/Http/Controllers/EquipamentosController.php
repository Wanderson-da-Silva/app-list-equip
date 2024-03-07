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

    $marcas = Marca::all();
    $forns = Fornecedor::all();
    return view('equipamento.create')->with('marcas', $marcas)->with('forns', $forns);
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
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento '{$request->nome}' não adicionada. Erro !");
    }
  }

  public function destroy(Equipamento $equipamento)
  {
    try {
      DB::beginTransaction();
      $equipamento->delete();
      DB::commit();

      return to_route('equipamentos.listar')
        ->with('mensagem.sucesso', "Equipamento '{$equipamento->nome}' removido com sucesso");
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento '{$equipamento->nome}' não excluido. Erro !");
    }
  }

  public function edit(Request $request)
  {

    $id = $request->equipamento;

    try {
      DB::beginTransaction();
      $marcas = Marca::all();
    $forns = Fornecedor::all();
      //$res = Equipamento::find($id);
      $res = Equipamento::select('equipamento.*', 'fornecedor.nome as nome_fornecedor', 'marca.nome as nome_marca')
    ->join('fornecedor', 'equipamento.id_fornecedor', '=', 'fornecedor.id')
    ->join('marca', 'equipamento.id_marca', '=', 'marca.id')
    ->where('equipamento.id', '=', $id)
    ->first();
      DB::commit();
      //dd( $res);
      return view('equipamento.edit')->with('res', $res)->with('marcas',$marcas)->with('forns',$forns);
    } catch (\Throwable $th) {

      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento de ID '{$id}' não encontrado. Erro !");
    }
  }

  public function update(EquipamentosFormRequest $request)
  {
    // dd($request->all());

    try {
      DB::beginTransaction();
      $res = Equipamento::find($request->id);

      //$equipamento->fill($request->all());
      //$equipamento->update();

      $res->update($request->all());
      DB::commit();
      return to_route('equipamentos.listar')
        ->with('mensagem.sucesso', "Equipamento '{$request->nome}' atualizado com sucesso");

      
    } catch (\Throwable $th) {
      DB::rollback();
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento de ID '{$request->id}' não encontrado ou erro na atualização. Erro !");
    }
  }
}
