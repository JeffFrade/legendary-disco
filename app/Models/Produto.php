<?php

namespace App\Models;

use Database\Factories\ProdutoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'id_categoria',
        'preco',
        'foto',
        'situacao'
    ];

    public static function newFactory()
    {
        return ProdutoFactory::new();
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }
}
