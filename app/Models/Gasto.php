<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'activo_id', 'documento_relacionado','monto'
    ];

    public function activo(){
        return $this->belongsTo(Activo::class);
    }
}
