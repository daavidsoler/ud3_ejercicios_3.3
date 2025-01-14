<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    // GET /api/alumnos -> devuelve todos los alumnos
    public function index()
    {
        return response()->json(Alumno::all(), 200);
    }

    // GET /api/alumnos/{id} -> devuelve el alumno id
    public function show($id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        return response()->json($alumno, 200);
    }

    // POST /api/alumnos -> crea un nuevo alumno
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
        ]);

        $alumno = Alumno::create($request->only(['nombre', 'email']));

        return response()->json($alumno, 201);
    }

    // PUT /api/alumnos/{id} -> actualiza el alumno id
    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:alumnos,email,' . $id,
        ]);

        $alumno->update($request->only(['nombre', 'email']));

        return response()->json($alumno, 200);
    }

    // DELETE /api/alumnos/{id} -> borra el alumno id
    public function destroy($id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        $alumno->delete();

        return response()->json(['message' => 'Alumno eliminado correctamente'], 200);
    }
}
