<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // GET /api/notas -> devuelve todos los notas
    public function index()
    {
        return response()->json(Nota::all(), 200);
    }

    // GET /api/notas/{id} -> devuelve el notas id
    public function show($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        return response()->json($nota, 200);
    }

    // POST /api/notas -> crea un nuevo notas
    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'nota' => 'required|numeric|min:0|max:10',
        ]);

        $nota = Nota::create($request->only(['alumno_id', 'asignatura_id', 'nota']));

        return response()->json($nota, 201);
    }

    // PUT /api/notas/{id} -> actualiza el notas id
    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        $request->validate([
            'alumno_id' => 'sometimes|exists:alumnos,id',
            'asignatura_id' => 'sometimes|exists:asignaturas,id',
            'nota' => 'sometimes|numeric|min:0|max:10',
        ]);

        $nota->update($request->only(['alumno_id', 'asignatura_id', 'nota']));

        return response()->json($nota, 200);
    }

    // DELETE /api/notas/{id} -> borra el notas id
    public function destroy($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        $nota->delete();

        return response()->json(['message' => 'Nota eliminada correctamente'], 200);
    }
}
