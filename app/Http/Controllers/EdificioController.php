<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EdificioController extends Controller
{
    public function index()
    {
        return Edificio::with('aulas')->get()->toJson();
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), ['nombre' => 'required|string|max:255']);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }

        $nuevo = new Edificio();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->save();

        return response($nuevo->toJson(), 201)->header('Content-Type', 'application/json');
    }

    public function show(Edificio $edificio)
    {
        return $edificio->load('aulas')->toJson();
    }

    public function update(Request $request, Edificio $edificio)
    {
        $v = Validator::make($request->all(), ['nombre' => 'required|string|max:255']);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }

        $edificio->nombre = $request->input('nombre');
        $edificio->save();

        return $edificio->toJson();
    }

    public function destroy(Edificio $edificio)
    {
        $edificio->delete();

        return $edificio->toJson();
    }
}