<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    // GET /api/asignaturas -> devuelve todos los asignaturas
    public function index()
    {
        return response()->json(Asignatura::all(), 200);
    }

    // GET /api/asignaturas/{id} -> devuelve el asignatura id
    public function show($id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['message' => 'Asignatura no encontrada'], 404);
        }

        return response()->json($asignatura, 200);
    }

    // POST /api/asignaturas -> crea un nuevo asignatura
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $asignatura = Asignatura::create($request->only(['nombre', 'descripcion']));

        return response()->json($asignatura, 201);
    }

    // PUT /api/asignaturas/{id} -> actualiza el asignatura id
    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['message' => 'Asignatura no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
        ]);

        $asignatura->update($request->only(['nombre', 'descripcion']));

        return response()->json($asignatura, 200);
    }

    // DELETE /api/asignaturas/{id} -> borra el asignatura id
    public function destroy($id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['message' => 'Asignatura no encontrada'], 404);
        }

        $asignatura->delete();

        return response()->json(['message' => 'Asignatura eliminada correctamente'], 200);
    }
}
