<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicioCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'valorTotal',
        'clienteId',
        'servicioId',
        'pagosRecibidos',
    ];
}
