<?php

namespace App\Http\Controllers;

use App\Models\Dato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('home', ['isAdmin' => $user->admin]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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


    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Auth::check() && Auth::user()->admin) {
            $datos = Dato::all();
            $isAdmin = Auth::user()->admin; // Definir la variable antes de enviarla a la vista
            return view('datos.show', compact('datos', 'isAdmin')); // Pasar ambas variables
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dato $dato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dato $dato)
    {
        $request->validate([
            'empresa' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'DNI' => 'required',
        ]);

        $dato->update($request->all());

        return redirect()->route('datos.show')->with('success', 'Datos actualizados correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dato $dato)
    {
        $dato->delete();
        return redirect()->route('datos.show')->with('success', 'Datos eliminados correctamente.');
    }

}
