<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = ['metodo_pagamento', 'data_pagamento','pedido_id'];

    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
