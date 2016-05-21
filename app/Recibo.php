<?php

namespace Auditoria;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    protected $table = 'recibos';


    protected $fillable = ['cod', 'fac', 'val','desc'];
    
}
