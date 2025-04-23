<?php

namespace App\Http\Controllers;

use App\Models\clinica;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClinicaController extends Controller
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
            'nombre' => 'required',
            'direccion' => 'required',
            'NIF' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',

        ]);
        Clinica::create($request->all());
        return redirect()->route('clinica.index')
            ->with('success', 'Clinica created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Auth::check() && Auth::user()->admin) {
            $clinicas = Clinica::all();
            $isAdmin = Auth::user()->admin; // Definir la variable antes de enviarla a la vista
            return view('clinicas.show', compact('clinicas', 'isAdmin')); // Pasar ambas variables
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clinica $clinica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */public function update(Request $request, clinica $clinica)
{
    $request->validate([
        'nombre' => 'required',
        'direccion' => 'required',
        'NIF' => 'required',
        'email' => 'required|email',
        'telefono' => 'required',
    ]);

    $clinica->update([
        'nombre' => $request->nombre,
        'direccion' => $request->direccion,
        'NIF' => $request->NIF,
        'email' => $request->email,
        'telefono' => $request->telefono,
    ]);

    return redirect()->route('clinicas.show')->with('success', 'Clínica actualizada correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clinica $clinica)
    {
        $clinica->delete();
        return redirect()->route('clinicas.show')->with('success', 'Clínica eliminada correctamente.');
    }

}
