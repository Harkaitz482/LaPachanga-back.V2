<?php

namespace App\Http\Controllers;

use App\Models\Apuesta;
use Illuminate\Http\Request;

class ApuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apuestas = Apuesta::all();
        return response()->json($apuestas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Add validation rules here
        ]);

        $apuesta = Apuesta::create($validatedData);
        return response()->json($apuesta, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apuesta  $apuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Apuesta $apuesta)
    {
        return response()->json($apuesta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apuesta  $apuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apuesta $apuesta)
    {
        $validatedData = $request->validate([
            // Add validation rules here
        ]);

        $apuesta->update($validatedData);
        return response()->json($apuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apuesta  $apuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apuesta $apuesta)
    {
        $apuesta->delete();
        return response()->json(null, 204);
    }


    public function Find($apuestaId)
    {
        try {
            // Obtén los datos del apuesta según su ID
            $apuesta = Apuesta::findOrFail($apuestaId);

            // Devuelve una respuesta con los detalles del apuesta
            return response()->json(['apuesta' => $apuesta], 200);
        } catch (\Exception $e) {
            // Manejo de errores: el apuesta no se encuentra
            return response()->json(['error' => 'apuesta no encontrado'], 404);
        }
    }
}
