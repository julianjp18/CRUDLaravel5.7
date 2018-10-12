<?php

namespace testcrud;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{
    
    
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "departamentos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre',
    ];
}
