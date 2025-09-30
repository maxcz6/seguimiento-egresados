<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    public function index()
    {
        return view('egresado.inicio');
    }
}
