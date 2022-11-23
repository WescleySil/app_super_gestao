<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id',
        'fornecedor_id'
    ];

    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }

    public function fornecedor(){
        return $this->belongsTo('App\Models\Fornecedor');
    }
}
