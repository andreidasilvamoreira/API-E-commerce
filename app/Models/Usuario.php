<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'senha', 'email', 'telefone'];

    public $timestamps = false;

    public function enderecoEntrega()
    {
        return $this->hasMany(EnderecosEntrega::class, 'usuario_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }

}
