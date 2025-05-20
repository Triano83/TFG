<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



class ListaController extends Controller
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



    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',

        ]);
        Lista::create($request->all());
        return redirect()->route('lista.index')
            ->with('success', 'Lista created successfully.');
    }


    public function show()
    {
        if (Auth::check() && Auth::user()->admin) {
            $lista = Lista::all();
            $isAdmin = Auth::user()->admin;
            return view('lista.show', compact('lista', 'isAdmin'));
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
        }
    }


    public function update(Request $request, $id)
    {


        $lista = Lista::find($id);
        $lista->update($request->all());

        return redirect()->route('lista.show')
            ->with('success', 'Lista actualizada.');
    }


    public function destroy(Lista $lista)
    {
        $lista->delete();

        return redirect()->route('lista.index')
            ->with('success', 'Lista deleted successfully.');
    }
}
