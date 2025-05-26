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
        if (Auth::check() && Auth::user()->admin) {
            $facturas = Factura::all();
            $listas = Lista::all();
            $clinicas = clinica::all();
            $datos = Dato::all();
            $isAdmin = Auth::user()->admin;
            return view('factura.index', compact('facturas', 'datos', 'clinicas', 'listas', 'isAdmin'));
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
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
