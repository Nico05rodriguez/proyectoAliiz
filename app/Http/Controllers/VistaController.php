<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Papeleria;

class VistaController extends Controller
{
    public function index()
    {
        $papelerias = Papeleria::all();
        return view('vista', compact('papelerias'));
    }
}
