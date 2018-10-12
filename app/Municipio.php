<?php

namespace testcrud;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model{
    
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "municipios";
    
    public static function municipios($id){
        return Municipio::where('id_departamento','=',$id)->get();
    }

}
