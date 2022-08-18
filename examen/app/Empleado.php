<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //Indica a que tabla va referenciado
    protected $table = 'empleado';

    protected $fillable = ['codigo','nombre','salarioDolares','salarioPesos','direccion','estado','ciudad','telefono','correo','activo','eliminado'];
}
