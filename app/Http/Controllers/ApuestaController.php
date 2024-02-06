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
            'gasto' => 'required|string', // Assuming 'gasto' should be stored as a string
            'ganancias' => 'required|string', // Assuming 'ganancias' should be stored as a string
            'fecha' => 'required|date', // Ensures the field is a valid date
            'user_id' => 'required|integer|exists:users,id', // Ensures the user_id exists in the users table
            'sala_id' => 'required|integer|exists:salas,id', // Ensures the sala_id exists in the salas table
            'equipo_id' => 'required|integer|exists:equipos,id', // Ensures the equipo_id exists in the equipos table
            'partido_id' => 'required|integer|exists:partidos,id', // Ensures the partido_id exists in the partidos table
            // Add any other fields and validation rules here
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
