<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Activo extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function gastos(){
        return $this->hasMany(Gasto::class)->where('activo_id','=', $this->id);
    }

}
