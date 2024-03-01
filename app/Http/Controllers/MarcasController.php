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
        $marca = Marca::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('marcas.index')->with('marca', $marca)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('marca.create');
    }

    public function store(MarcasFormRequest $request)
    {
        $marca = Marcas::create($request->all());
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

        return to_route('marcas.index')
            ->with('mensagem.sucesso', "Marca '{$marca->nome}' adicionada com sucesso");
    }

    public function destroy(Marca $marcas)
    {
        $marcas->delete();

        return to_route('marcas.index')
            ->with('mensagem.sucesso', "Marca '{$marcas->nome}' removida com sucesso");
    }

    public function edit(Marca $marca)
    {
        return view('marca.edit')->with('marca', $marca);
    }

    public function update(Marca $marca, MarcasFormRequest $request)
    {
        $marcas->fill($request->all());
        $marcas->save();

        return to_route('marcas.index')
            ->with('mensagem.sucesso', "Marca '{$marcas->nome}' atualizada com sucesso");
    }
}
