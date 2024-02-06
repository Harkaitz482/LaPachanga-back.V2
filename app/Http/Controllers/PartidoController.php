<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class PartidoController extends Controller
{
    // Muestra una lista de todos los partidos
    public function index()
    {
        $partidos = Partido::all();
        return response()->json($partidos);
    }

    // Almacena un nuevo partido en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idPartidos' => 'required',
            'mapa' => 'required',
            'arbitro' => 'required',
            'liga_idLiga' => 'required',
            'equipos_idequipos1' => 'required',
            'equipos_idequipos2' => 'required',
            'fecha/hora' => 'required',
            'Puntuacion' => 'required',
            'liga_id' => 'required',
        ]);

        $partido = Partido::create($validatedData);
        return response()->json($partido, 201);
    }

    // Muestra un partido específico por ID
    public function show($id)
    {
        $partido = Partido::findOrFail($id);
        return response()->json($partido);
    }

    // Actualiza un partido específico por ID
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'idPartidos' => 'required',
            'mapa' => 'required',
            'arbitro' => 'required',
            'liga_idLiga' => 'required',
            'equipos_idequipos1' => 'required',
            'equipos_idequipos2' => 'required',
            'fecha' => 'required',
            'Puntuacion' => 'required',
            'liga_id' => 'required',
        ]);

        $partido = Partido::findOrFail($id);
        $partido->update($validatedData);
        return response()->json($partido);
    }

    // Elimina un partido específico por ID
    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->delete();
        return response()->json(null, 204); // No Content
    }


    public function Find($partidoId)
    {
        try {
            // Obtén los datos del partido según su ID
            $partido = Partido::findOrFail($partidoId);

            // Devuelve una respuesta con los detalles del partido
            return response()->json(['partido' => $partido], 200);
        } catch (\Exception $e) {
            // Manejo de errores: el partido no se encuentra
            return response()->json(['error' => 'partido no encontrado'], 404);
        }
    }


    public function matchesThisWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString();

        $matches = Partido::whereBetween('fecha', [$startOfWeek, $endOfWeek])->get();

        return response()->json($matches);
    }


    public function matchesToday()
    {
        $today = Carbon::now()->toDateString();

        $matches = Partido::whereDate('fecha', $today)->get();

        return response()->json($matches);
    }

    public function getCuotasForPartido($partidoId)
    {
        $partido = Partido::with(['equipo.cuota', 'equipo2.cuota'])->find($partidoId);

        if (!$partido) {
            return response()->json(['message' => 'Partido not found'], 404);
        }

        $cuotas = [
            'equipo1_cuota' => $partido->equipo->cuota->valor ?? null,
            'equipo2_cuota' => $partido->equipo2->cuota->valor ?? null,
        ];

        return response()->json($cuotas);
    }
}
