<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    // Muestra una lista de todas las ligas
    public function index()
    {
        $ligas = Liga::all();
        return response()->json($ligas);
    }

    // Almacena una nueva liga en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idLiga' => 'required|integer|unique:ligas',
            'nombre' => 'required|string|max:255',
            'split' => 'required|string|max:255',
            // Añade aquí cualquier otra validación que necesites
        ]);

        $liga = Liga::create($validatedData);
        return response()->json($liga, 201);
    }

    // Muestra una liga específica por ID
    public function show($id)
    {
        $liga = Liga::findOrFail($id);
        return response()->json($liga);
    }

    // Actualiza una liga específica por ID
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'split' => 'sometimes|required|string|max:255',
            // Añade aquí cualquier otra validación que necesites para la actualización
        ]);

        $liga = Liga::findOrFail($id);
        $liga->update($validatedData);
        return response()->json($liga);
    }

    // Elimina una liga específica por ID
    public function destroy($id)
    {
        $liga = Liga::findOrFail($id);
        $liga->delete();
        return response()->json(null, 204); // No Content
    }

    
    public function Find($ligaId)
    {
        try {
            // Obtén los datos del liga según su ID
            $liga = Liga::findOrFail($ligaId);

            // Devuelve una respuesta con los detalles del liga
            return response()->json(['liga' => $liga], 200);
        } catch (\Exception $e) {
            // Manejo de errores: el liga no se encuentra
            return response()->json(['error' => 'liga no encontrado'], 404);
        }
    }
}
