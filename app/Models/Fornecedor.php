<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    //protected $primaryKey = 'idSerie';
    protected $fillable = ['nome','CNPJ','id','updated_at'];
    protected $table = 'fornecedor';
    //ativando isso sempre que buscar as series vou buscar tambem as temporadas da serie
    //protected $with = ['temporadas'];

    //public $timestamps = false;
    

//    public function marca(){
        //relacao de muitos para um - essa temporada possui/pertence a uma unica serie
    //    return $this->belongsTo(Marca::class);
  //  }
    //public function episodios(){
      //  return $this->hasMany(Episodio::class);
    //}
}
