<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Muestra una lista de todos los equipos
    public function index()
    {
        $equipos = Equipo::all();
        return response()->json($equipos);
    }

    // Almacena un nuevo equipo en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idequipos' => 'required|integer|unique:equipos,idequipos',
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'manager' => 'required|string|max:255',
            'Cuotas_idCuotas' => 'required|integer|exists:cuotas,id',
            'liga_id' => 'required|integer|exists:ligas,id',
        ]);

        $equipo = Equipo::create($validatedData);
        return response()->json($equipo, 201);
    }

    // Muestra un equipo específico por ID
    public function show($id)
    {
        $equipo = Equipo::findOrFail($id);
        return response()->json($equipo);
    }

    // Actualiza un equipo específico por ID
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'puesto' => 'sometimes|required|string|max:255',
            'manager' => 'sometimes|required|string|max:255',
            'Cuotas_idCuotas' => 'sometimes|required|integer|exists:cuotas,id',
            'liga_id' => 'sometimes|required|integer|exists:ligas,id',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->update($validatedData);
        return response()->json($equipo);
    }

    // Elimina un equipo específico por ID
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();
        return response()->json(null, 204); // No Content
    }

    
    public function Find($equipoId)
    {
        try {
            // Obtén los datos del equipo según su ID
            $equipo = Equipo::findOrFail($equipoId);

            // Devuelve una respuesta con los detalles del equipo
            return response()->json(['equipo' => $equipo], 200);
        } catch (\Exception $e) {
            // Manejo de errores: el equipo no se encuentra
            return response()->json(['error' => 'equipo no encontrado'], 404);
        }
    }
}
