<?php

namespace testcrud;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model{
    
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "usuarios";
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'correo', 'telefono', 'movil', 'direccion', 'id_municipio',
    ];

    public function insertar_usuario($nombre,$apellido,$direccion,$correo,$telefono,$movil,$municipio){
        $data=DB::select('SELECT id FROM usuarios ORDER BY id DESC LIMIT 1');
        
        DB::insert('INSERT INTO usuarios (nombre,apellido,correo,telefono,movil,direccion,id_municipio,slug) VALUES (:nombre,:apellido,:correo,:telefono,:movil,:direccion,:municipio,:slug)',
        ['nombre' => $nombre,'apellido' => $apellido,'correo' => $correo, 'telefono' => $telefono, 'movil' => $movil,
        'direccion' => $direccion, 'municipio' => $municipio ,'slug' => $nombre.$data[0]]);

        return true;
    }

    public function traer_usuarios(){
        return DB::select('SELECT usuarios.slug,usuarios.id,usuarios.nombre,usuarios.apellido,usuarios.correo,usuarios.telefono,usuarios.movil,usuarios.direccion,municipios.nombre as nom_municipio FROM usuarios,municipios WHERE usuarios.id_municipio=municipios.id_municipio');
    }

    public function traer_usuario($id){
        return DB::select('SELECT usuarios.id,usuarios.nombre,usuarios.apellido,usuarios.correo,usuarios.telefono,usuarios.movil,usuarios.direccion,municipios.nombre as nom_municipio,municipios.id_municipio,departamentos.id as id_departamento,departamentos.nombre as nom_departamento FROM usuarios,municipios,departamentos WHERE departamentos.id=municipios.id_departamento AND usuarios.id_municipio=municipios.id_municipio AND usuarios.id=:id',['id'=>$id]);
    }

    public function eliminar_usuario($id){
        return DB::table('usuarios')->where('id', '=', $id)->delete();
    }

    public function editar_usuario($request,$id){   
        return DB::update('UPDATE usuarios SET nombre = :nombre , apellido = :apellido, correo = :correo, telefono = :telefono, movil = :movil, direccion = :direccion, id_municipio = :municipio WHERE id = :id',
        ['nombre' => $request->input('txt_nombre'),'apellido' => $request->input('txt_apellido'),'correo' => $request->input('txt_correo'), 'telefono' => $request->input('txt_telefono'), 'movil' => $request->input('txt_movil'),
        'direccion' => $request->input('txt_direccion'), 'municipio' => $request->input('town') ,'id' =>$id]);
    } 

}
