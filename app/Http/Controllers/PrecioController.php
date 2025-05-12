<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PrecioController extends Controller
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
            'producto' => 'required',
            'precio' => 'required|numeric',
        ]);

        Precio::create($request->all());

        return redirect()->route('precios.index')->with('success', 'Precio agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Precio $precio)
    {
              if (Auth::check() && Auth::user()->admin) {
            $precios = Precio::all();
            $isAdmin = Auth::user()->admin; // Definir la variable antes de enviarla a la vista
            return view('precio.show', compact('precios', 'isAdmin')); // Pasar ambas variables
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Precio $precio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Precio $precio)
    {
        $request->validate([
            'producto' => 'required',
            'precio' => 'required|numeric',
        ]);

        $precio->update($request->all());

        return redirect()->route('precios.show')->with('success', 'Precio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Precio $precio)
    {
        $precio->delete();

        return redirect()->route('precios.show')->with('success', 'Precio eliminado correctamente.');
    }
}
