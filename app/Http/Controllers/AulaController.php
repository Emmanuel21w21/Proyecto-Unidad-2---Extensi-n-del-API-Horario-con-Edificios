<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Edificio;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::with('edificio')->get();

        return view('aula.listado', compact('aulas'));
    }

    public function create(Request $request)
    {
        $edificios = Edificio::orderBy('nombre')->get();
        $edificioSeleccionado = $request->query('edificio_id');

        return view('aula.agregar', compact('edificios', 'edificioSeleccionado'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'capacidad' => ['required', 'integer', 'min:1'],
            'edificio_id' => ['required', 'exists:edificios,id'],
            'wifi' => ['nullable', 'boolean'],
        ]);

        $aula = new Aula();
        $aula->nombre = $datos['nombre'];
        $aula->capacidad = $datos['capacidad'];
        $aula->edificio_id = $datos['edificio_id'];
        $aula->wifi = $request->boolean('wifi');
        $aula->save();

        return redirect()->route('aulas.listar')->with('status', 'Aula agregada correctamente.');
    }

    public function show($x)
    {
        return "mostrare la aula $x";
    }

    public function edit($cual)
    {
        $aula = Aula::findOrFail($cual);
        $edificios = Edificio::orderBy('nombre')->get();

        return view('aula.modificar', compact('aula', 'edificios'));
    }

    public function update(Request $request, $x)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'capacidad' => ['required', 'integer', 'min:1'],
            'edificio_id' => ['required', 'exists:edificios,id'],
            'wifi' => ['nullable', 'boolean'],
        ]);

        $aula = Aula::findOrFail($x);
        $aula->nombre = $datos['nombre'];
        $aula->capacidad = $datos['capacidad'];
        $aula->edificio_id = $datos['edificio_id'];
        $aula->wifi = $request->boolean('wifi');
        $aula->save();

        return redirect()->route('aulas.listar')->with('status', 'Aula actualizada correctamente.');
    }

    public function destroy($x)
    {
        Aula::findOrFail($x)->delete();

        return redirect()->route('aulas.listar')->with('status', 'Aula eliminada correctamente.');
    }
}
