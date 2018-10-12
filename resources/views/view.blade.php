@extends('layouts.layout')


@section('title','Ver usuarios')

@section('content')
    <br>
    <div class="container white">
        <br>
        <h1>Visualización usuarios registrados</h1>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-success" href="/create">Agregar</a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="/logout">Salir</a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Móvil</th>
                        <th>Correo</th>
                        <th>Diección</th>
                        <th>Ciudad</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <?php if(!empty($usuarios)){ ?>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->nombre}}</td>
                            <td>{{$usuario->apellido}}</td>
                            <td>{{$usuario->telefono}}</td>
                            <td>{{$usuario->movil}}</td>
                            <td>{{$usuario->correo}}</td>
                            <td>{{$usuario->direccion}}</td>
                            <td>{{$usuario->nom_municipio}}</td>
                            <td>
                                <a class="btn btn-warning" href="/update/{{$usuario->id}}"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="/delete/{{$usuario->id}}"><i class="fa fa-user-minus"></i></a>
                            </td>
                        </tr>                
                    @endforeach
                <?php }else{ ?>
                   <tr>
                       <td colspan="9"><h2>No existen registros por el momento, <a class="btn btn-success" href="/create">Agregar</a></h2></td></tr>
                <?php }   ?>
            </table>
        </div>
    </div>
    <br>
@endsection