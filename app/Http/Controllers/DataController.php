<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poktan;

class DataController extends Controller
{
    public function poktans()
    {
        $poktan = Poktan::orderBy('poktan_name', 'ASC');
        return datatables()->of($poktan)
            ->addColumn('action', 'poktan.buttons')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
