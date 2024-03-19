<?php

namespace App\Repositorios;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Auth\Events\Login;

class EloquentLoginRepositorio implements LoginRepositorio{
//service container e provider
public function add( Array $equipamento){

    try{
        $result = DB::transaction( function () use ($equipamento) {
            $equip = User::create($equipamento);
            return $equip;
        }   );
        return $result;

    } catch (\Throwable $th) {
        return $th;

        }
    
      
}
public function delete(User $id){
try{
    $id->delete();
    return true;
}
catch (\Throwable $th){
    return $th;

}
    
}



}
