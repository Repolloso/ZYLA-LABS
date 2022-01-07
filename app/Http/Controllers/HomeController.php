<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(request $request)
    {
        // para el buscador traigo el texto (name del input) y le pongo trim para que no acepte espacione entre texto
        $texto=trim($request->get('texto'));
        // cuando uso el DB debo compactar el array que guarda la consulta para poder mostar en la vista
        $datos=DB::table('contactos')->select('id','nombre','email','telefono','direccion')->where('nombre','LIKE','%'.$texto.'%')->orWhere('email','LIKE','%'.$texto.'%')->paginate(20);

        return view('contacto.index', compact('datos','texto'));
    }
}
