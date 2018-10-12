<?php

namespace testcrud\Http\Controllers;


use testcrud\Usuario;
use testcrud\Departamento;
use testcrud\Municipio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $usuario = new Usuario();

        $usuarios=$usuario->traer_usuarios();

        return view('view', ['usuarios' => $usuarios]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
       $departamentos = Departamento::pluck('nombre', 'id');

        return view('create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $usuario = new Usuario();

        /**$usuario->nombre = $request->input('txt_nombre');
        $usuario->apellido = $request->input('txt_apellido');
        $usuario->direccion = $request->input('txt_direccion');
        $usuario->correo = $request->input('txt_correo');
        $usuario->telefono = $request->input('txt_telefono');
        $usuario->movil = $request->input('txt_movil');
        $usuario->id_municipio = $request->input('town');
        $usuario->save();
        */
        
        $save=$usuario->insertar_usuario($request->input('txt_nombre'),$request->input('txt_apellido'),$request->input('txt_direccion'),
        $request->input('txt_correo'),$request->input('txt_telefono'),$request->input('txt_movil'),$request->input('town'));
        if($save){
            return redirect()->action('UserController@index');
        }else{
            return "No se pudo realizar";
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    public function getTowns(Request $request, $id){
        if($request->ajax()){
            $towns = Municipio::municipios($id);
            return response()->json($towns);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $usuarioid = new Usuario();

        $usuario=$usuarioid->traer_usuario($id);
        $departamentos = Departamento::pluck('nombre', 'id');
        return view('edit', compact('usuario','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $usuario = new Usuario();

        $modificacion = $usuario->editar_usuario($request, $id);
        if($modificacion){
            return redirect()->action('UserController@index');
        }else{
            return "No se pudo realizar";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = new Usuario();
        
        $eliminar = $usuario->eliminar_usuario($id);

        if($eliminar){
            return redirect()->action('UserController@index');
        }else{
            return "No se puedo eliminar";
        }
        
    }
}
