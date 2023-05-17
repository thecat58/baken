<?php

namespace App\Http\Controllers;

use App\Models\tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data=tarea::all();
        return Response()->json($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new tarea();
        $post->nombre=$request->nombre;
        $post->descripcion=$request->descripcion;
        $post->estado=$request->estado;
        $post->save();
        return response()->json(['message' => 'ingresate tarea nueva']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $tarea=tarea::all()->find($id);
        return response()-> jso($tarea);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
             
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
           
        ]);
        $data = $request->all();
        $grupo = tarea::findOrFail($id);
        $grupo->update([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'estado' => $data['estado'],
            
        ]);
        return response()->json(['message' => 'Persona actualizada correctamente']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $tarea)
    {
       $eliminarTarea=tarea::findOrFail($tarea);
       $eliminarTarea->delete();
       return response()->json(['message' => 'tara fue eliminada']);
    }
}
