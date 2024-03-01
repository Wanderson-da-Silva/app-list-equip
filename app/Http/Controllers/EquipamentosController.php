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
        $mensagemSucesso = session('mensagem.sucesso');

        return view('equipamento.index')->with('equipamentos', $equipamentos)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('equipamento.create');
    }

    public function store(EquipamentosFormRequest $request)
    {
        $equip = Equipamento::create($request->all());
        //$marc = [];
        //for ($i = 1; $i <= $request->marcasQty; $i++) {
            //esta seno preenchido um array com a numeracao de marcas vinculadas ao equipamento
            //uma serie tem várias temporadas, esse array criaria as temporadas vinculadas a uma
            //unica serie com somente um insert longo
          //  $marcas[] = [
            //    'equip_id' => $equip->id,
              //  'number' => $i,
            //];
       // }
        //Marca::insert($marc);

        //$fornecedores = [];
        //foreach ($equip->marcas as $marca) {
          //  for ($j = 1; $j <= $request->fornecedoresPerSeason; $j++) {
            //    $fornecedores[] = [
              //      'marca_id' => $marca->id,
                //    'number' => $j
                //];
           // }
       // }
        //Fornecedor::insert($fornecedor);

        return to_route('equipamentos.listar')
            ->with('mensagem.sucesso', "Equipamento '{$equip->nome}' adicionada com sucesso");
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

      return view('equipamento.edit')->with('res', $res );
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
