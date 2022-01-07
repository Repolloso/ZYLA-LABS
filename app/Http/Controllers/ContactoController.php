<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // para el buscador traigo el texto (name del input) y le pongo trim para que no acepte espacione entre texto
        $texto=trim($request->get('texto'));

        // cuando uso el DB debo compactar el array que guarda la consulta para poder mostar en la vista
        $datos=DB::table('contactos')->select('id','nombre','email','telefono','direccion')->where('nombre','LIKE','%'.$texto.'%')->orWhere('email','LIKE','%'.$texto.'%')->paginate(20);

        return view('contacto.index', compact('texto','datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosContacto = request() -> except('_token', 'Enviar');
        Contacto::insert($datosContacto);

        return redirect('contactos') -> with('mensaje', 'Contacto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('contacto.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ContactoEdit = request()->except('_token', '_method');
        Contacto::where('id', $id)->update($ContactoEdit);
        $contacto= Contacto::findOrFail($id);
        return response()->redirectTo('/contactos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacto::destroy($id);
        return response()->redirectTo('contactos');
    }
}
