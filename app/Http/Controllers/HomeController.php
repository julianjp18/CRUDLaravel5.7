<?php

namespace testcrud\Http\Controllers;

use testcrud\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = new Usuario();

        $usuarios=$usuario->traer_usuarios();

        return view('view', ['usuarios' => $usuarios]);
    }

    protected function redirectTo(){
        return '/';
    }
}
