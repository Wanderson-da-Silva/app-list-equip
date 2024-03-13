<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $table = 'equipamento';
    protected $fillable = ['nome','id_marca','id','id_fornecedor','updated_at','status'];

    protected $casts = ['watched' => 'boolean'];
    //public function fornecedor(){
        //relacao de muitos para um - essa temporada/equip possui/pertence a uma unica serie/marca
      // return $this->belongsTo(Fornecedor::class);
    //}
    //public function episodios(){
      //  return $this->hasMany(Episodio::class);
    //}
}
