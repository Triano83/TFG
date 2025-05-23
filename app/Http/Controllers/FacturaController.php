<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\clinica;
use App\Models\Dato;
use App\Models\Lista;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class FacturaController extends Controller
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

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Factura $factura)
    {
        if (Auth::check() && Auth::user()->admin) {
            $lista = Lista::all();
            $clinica = clinica::all();
            $dato = Dato::all();
            $isAdmin = Auth::user()->admin;
            return view('lista.show', compact('lista','dato','clinica', 'isAdmin'));
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }


    public function update(Request $request, Factura $factura)
    {
        //
    }


    public function destroy(Factura $factura)
    {
        //
    }
}
