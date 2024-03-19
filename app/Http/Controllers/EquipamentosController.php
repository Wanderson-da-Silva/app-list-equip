<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipamentosFormRequest;
use App\Models\Fornecedor;
use App\Models\Marca;
use App\Models\Equipamento;
use App\Repositorios\EquipamentoRepositorio;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipamentosController extends Controller
{
//essa interface de repositorio está conectada com o eloquentEquipamentoRepositorio
//ver no providers, RepositorioProvider = ele linka o EquipamentoRepositorio com EloquentEquipamento... 
//e confg\app no Provider onde é indicado para carregar o provider
  public function __construct(private EquipamentoRepositorio $equipReposit)
  {
  }

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

    $dadosEquipamento = $request->only(['nome', 'id_fornecedor', 'id_marca','status']);

    $equipa = $this->equipReposit->add($dadosEquipamento);
    if ($equipa === true) {
      return to_route('equipamentos.listar')
        ->with('mensagem.sucesso', "Equipamento '{$dadosEquipamento['nome']}' adicionada com sucesso");
    } else {
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      //Erro: '{$equipa}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento '{$dadosEquipamento['nome']}' não adicionada. Erro !");
    }
  }

  public function destroy(Equipamento $equipamento)
  {

    $equipa = $this->equipReposit->delete($equipamento);
    if ($equipa === true) {

      return to_route('equipamentos.listar')
        ->with('mensagem.sucesso', "Equipamento '{$equipamento->nome}' removido com sucesso");
    } else {

      //Erro: '{$equipa}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento '{$equipamento->nome}' não excluido. Erro !");
    }
  }

  public function edit(Request $request)
  {

    $id = $request->equipamento;



    $marcas = Marca::all();
    $forns = Fornecedor::all();

    $res = $this->equipReposit->findAltEquip($id);

    if (!$res) {
      //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento de ID '{$id}' não encontrado. Erro !");
    } else {
      //dd( $res);
      return view('equipamento.edit')->with('res', $res)->with('marcas', $marcas)->with('forns', $forns);
    }
  }

  public function update(EquipamentosFormRequest $request)
  {
     //dd($request->all());

    $dadosEquipamento = $request->only(['id', 'nome', 'id_fornecedor', 'id_marca','status']);

    if($dadosEquipamento['status']=="false"){
      $dadosEquipamento['status']=0;
    }else{$dadosEquipamento['status']=1;}

    //dd($dadosEquipamento);
    $equipa = $this->equipReposit->update($dadosEquipamento);


    if ($equipa) {
      return to_route('equipamentos.listar')
        ->with('mensagem.sucesso', "Equipamento '{$request->nome}' atualizado com sucesso");
    } else { //Erro: '{$th}' retirado - em caso de erro acrescentar e testar
      return to_route('equipamentos.listar')
        ->with('mensagem.erro', "Equipamento de ID '{$request->id}' não encontrado ou erro na atualização. Erro !");
    }
  }
}
