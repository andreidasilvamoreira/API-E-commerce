<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['status','total', 'data_criacao', 'data_atualizacao','usuario_id'];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

}
