<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'estoque', 'categoria_id'];

    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function itensPedidos()
    {
        return $this->hasMany(ItensPedido::class, 'produto_id');
    }
}
