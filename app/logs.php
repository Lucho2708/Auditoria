<?php

namespace Auditoria;

use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    protected $fillable = ['name', 'role','accion', 'descripcion' ];
}
