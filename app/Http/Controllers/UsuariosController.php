<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuariosController extends Controller
{
    public function index(){

        $usuarios =  Usuarios::get();
        return view('usuarios.list',['usuarios' => $usuarios]);
    }

    public function new(){

        return view('usuarios.form');
    }

    public function add(Request $request){

        $usuario = new Usuarios();
        $usuario = $usuario->create( $request->all());
        return Redirect::to('/usuarios');
    }

    public function edit($id){

        $usuario = Usuarios::findOrFail( $id );
        return view('usuarios.form', ['usuarios' => $usuario] );        
    }

    public function update(  $id ,Request $request ){
        $usuario = Usuarios::findOrFail( $id );
        $usuario->update( $request->all());
        return Redirect::to('/usuarios');

    }


    public function delete($id){
        $usuario = Usuarios::findOrFail( $id );
        $usuario->delete();
        return Redirect::to('/usuarios');
    }
}
