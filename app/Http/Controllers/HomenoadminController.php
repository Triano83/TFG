<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class homenoadminController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();
            if (!$user->admin) {
                return view("homenoadmin");
            } else {
                return view('/');
            }

        } else {
            return view('/');
        }
    }
}

