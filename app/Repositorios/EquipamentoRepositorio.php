<?php

namespace App\Repositorios;
use Illuminate\Support\Facades\DB;
use App\Models\Equipamento;


class EquipamentoRepositorio{

public function add( Array $equipamento){

    try{
        $result = DB::transaction( function () use ($equipamento) {
            $equip = Equipamento::create($equipamento);
            return $equip;
        }   );
        return true;

    } catch (\Throwable $th) {
        return $th;

        }
    
      
}
public function delete(Equipamento $id){
try{
    $id->delete();
    return true;
}
catch (\Throwable $th){
    return $th;

}
    
}

public function findAltEquip(String $id){
try{
    //$res = Equipamento::find($id);
    $res = Equipamento::select('equipamento.*', 'fornecedor.nome as nome_fornecedor', 'marca.nome as nome_marca')
      ->join('fornecedor', 'equipamento.id_fornecedor', '=', 'fornecedor.id')
      ->join('marca', 'equipamento.id_marca', '=', 'marca.id')
      ->where('equipamento.id', '=', $id)
      ->first();
    //first pega o primeiro resultado da consulta, por usar o id ou retorna o valor procurado
    // ou retorna nulo sem dados erro}
    return $res;
}
catch (\Throwable $th){
    return false;

}
}

public function update (Array $equipamento){
    try{
        $res = Equipamento::find($equipamento['id']);

        //$equipamento->fill($request->all());
        //$equipamento->update();
  
        $res->update($equipamento);
        return true;
    }
    catch (\Throwable $th){

        return false;
    }
    
}

}
