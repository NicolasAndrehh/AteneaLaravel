<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_documento',
        'tipo_documento',
        'nombres',
        'apellidos',
        'ciudad',
        'direccion',
        'telefono',
        'correo',
        'cargo',
        'horario',
        'estado',
        'contrato',
        'foto',
    ];
        



    public function user(){
        return $this->hasMany(User::class) ;
    }
   
}
