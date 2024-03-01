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
        $forn = Fornecedor::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('fornecedors.index')->with('fornecedor', $fornecedor)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('fornecedor.create');
    }

    public function store(FornecedorsFormRequest $request)
    {
        $fornecedor = Fornecedors::create($request->all());
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

        return to_route('fornecedors.index')
            ->with('mensagem.sucesso', "Fornecedor '{$fornecedor->nome}' adicionado com sucesso");
    }

    public function destroy(Fornecedor $fornecedors)
    {
        $marcas->delete();

        return to_route('fornecedors.index')
            ->with('mensagem.sucesso', "Fornecedor '{$marcas->nome}' removido com sucesso");
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor.edit')->with('fornecedor', $fornecedor);
    }

    public function update(Fornecedor $fornecedor, FornecedorsFormRequest $request)
    {
        $fornecedor->fill($request->all());
        $fornecedor->save();

        return to_route('fornecedors.index')
            ->with('mensagem.sucesso', "Fornecedor '{$fornecedors->nome}' atualizado com sucesso");
    }
}
