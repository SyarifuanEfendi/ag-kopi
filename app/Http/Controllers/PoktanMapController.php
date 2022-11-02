<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poktan;

class PoktanMapController extends Controller
{
    public function index()
    {
        $poktan = Poktan::get();
        return view('poktan.map', compact('poktan'));
    }
}
