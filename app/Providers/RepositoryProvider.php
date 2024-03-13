<?php

namespace App\Providers;

use App\Repositorios\EloquentEquipamentoRepositorio;
use App\Repositorios\EquipamentoRepositorio;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    //adicionar FornecedorRepositorio::class=>EloquentFornecedorRepositorio::class
    //adicionar MarcaRepositorio::class=>EloquentMarcaRepositorio::class - com um virgula separando
    public array $bindings = [
        EquipamentoRepositorio::class=>EloquentEquipamentoRepositorio::class

    ];
    
    /**
     * Register services.
     
    *public function register(): void
    *{
     *   $this->app->bind(EquipamentoRepositorio::class,EloquentEquipamentoRepositorio::class);
    *}
*/
    
}
