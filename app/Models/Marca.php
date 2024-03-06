<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $table = 'marca';
    protected $fillable = ['nome','id','updated_at'];
    //public function fornecedor(){
        //relacao de muitos para um - essa temporada/equip possui/pertence a uma unica serie/marca
      // return $this->belongsTo(Fornecedor::class);
    //}
    //public function episodios(){
      //  return $this->hasMany(Episodio::class);
    //}
}
