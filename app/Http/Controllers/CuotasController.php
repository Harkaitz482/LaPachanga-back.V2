<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;

class CuotasController extends Controller
{
    // Muestra una lista de todas las cuotas
    public function index()
    {
        $cuotas = Cuota::all();
        return response()->json($cuotas);
    }

    // Almacena una nueva cuota en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idCuotas' => 'required|integer|unique:cuotas',
            'valor' => 'required|numeric',
        ]);

        $cuota = Cuota::create($validatedData);
        return response()->json($cuota, 201);
    }

    // Muestra una cuota específica por ID
    public function show($id)
    {
        $cuota = Cuota::findOrFail($id);
        return response()->json($cuota);
    }

    // Actualiza una cuota específica por ID
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'valor' => 'required|numeric',
        ]);

        $cuota = Cuota::findOrFail($id);
        $cuota->update($validatedData);
        return response()->json($cuota);
    }

    // Elimina una cuota específica por ID
    public function destroy($id)
    {
        $cuota = Cuota::findOrFail($id);
        $cuota->delete();
        return response()->json(null, 204); // No Content
    }

    
    public function Find($cuotaId)
    {
        try {
            // Obtén los datos del cuota según su ID
            $cuota = Cuota::findOrFail($cuotaId);

            // Devuelve una respuesta con los detalles del cuota
            return response()->json(['cuota' => $cuota], 200);
        } catch (\Exception $e) {
            // Manejo de errores: el cuota no se encuentra
            return response()->json(['error' => 'cuota no encontrado'], 404);
        }
    }
}
