<?php

namespace App\Http\Controllers;

use App\Models\Dato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatoController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('home', ['isAdmin' => $user->admin]);
        } else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:datos,email',
            'DNI' => 'required|unique:datos,DNI',
        ]);

        Dato::create($request->all());

        return redirect()->route('datos.index')->with('success', 'Datos agregados correctamente.');
    }

    public function show()
    {
        if (Auth::check() && Auth::user()->admin) {
            $datos = Dato::all();
            $isAdmin = Auth::user()->admin;
            return view('datos.show', compact('datos', 'isAdmin'));
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
        }
    }

    public function update(Request $request, $id)
    {
        $dato = Dato::findOrFail($id);
        $dato->update($request->all());
        return redirect()->route('datos.show')->with('success', 'Datos actualizados correctamente.');

    }




    public function destroy(Dato $dato)
    {
        $dato->delete();
        return redirect()->route('datos.show')->with('success', 'Datos eliminados correctamente.');
    }

}
