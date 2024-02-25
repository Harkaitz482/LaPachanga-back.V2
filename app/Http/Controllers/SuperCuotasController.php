<?php

namespace App\Http\Controllers;

use App\Models\SuperCuota;
use Illuminate\Http\Request;

class SuperCuotasController extends Controller
{
    public function index()
    {
        $superCuotas = SuperCuota::all();
        return response()->json($superCuotas);
    }

    public function create()
    {
        return view('superCuotas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'equipo_id' => 'required|integer|exists:equipos,id',
            'cuota_id' => 'required|integer|exists:cuotas,id',
        ]);

        $superCuota = SuperCuota::create($validatedData);
    }

    public function show(SuperCuota $superCuota)
    {
        $superCuota = SuperCuota::all();
    }

    public function edit(SuperCuota $superCuota)
    {
        return view('superCuotas.edit', compact('superCuota'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'equipo_id' => 'required|integer|exists:equipos,id',
            'cuota_id' => 'required|integer|exists:cuotas,id',
        ]);
    
        $superCuota = SuperCuota::findOrFail($id);
        $superCuota->nombre = $validatedData['nombre'];
        $superCuota->equipo_id = $validatedData['equipo_id'];
        $superCuota->cuota_id = $validatedData['cuota_id'];
    
        $superCuota->save(); // Utilizar save() para aplicar los cambios
        return response()->json($superCuota);
    }

    public function destroy($id)
    {
        $superCuota = SuperCuota::findOrFail($id); // Encuentra la super cuota o falla con 404
        $superCuota->delete(); // Elimina la super cuota
        return response()->json(null, 204); // Devuelve una respuesta sin contenido
    }
    
}
