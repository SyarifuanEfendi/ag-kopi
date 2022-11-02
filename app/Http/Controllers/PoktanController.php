<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Poktan;

class PoktanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $data = Poktan::all();
        }else{
            $data = Poktan::where('id_user', $user->id)->get();
        }

        return view('be.page.poktan.index', compact('data'));
    }

    public function create()
    {
        return view('be.page.poktan.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'place_name' => 'required|min:3',
            'address'   => 'required|min:10',
            'longitude'  => 'required',
            'latitude'  => 'required'
        ]);
        Poktan::create([
            'place_name' => $request->place_name,
            'address'  => $request->address,
            // 'description' => $request->description,
            'logitude' => $request->longitude,
            'latitude' => $request->latitude,
            'luas_lahan' => $request->luas_lahan,
            'jumlah_tanaman' => $request->jumlah_tanaman,
            'jenis_kopi' => $request->jenis_kopi,
            'jarak_tanam' => $request->jarak_tanam,
            'waktu_tanam' => $request->waktu_tanam,
            'produksi' => $request->produksi,
        ]);
        // notify()->success('Data Berhasil Di Input');
        return redirect()->route('poktan.index');
    }

    public function edit($id)
    {
        $data = Poktan::where('id', $id)->get();
        return view('be.page.poktan.edit',compact('data'));
    }

    public function update(Request $request)
    {
        # code...
    }

    public function show($id)
    {
        DB::select("delete from poktans where id = '$id'");

        return response()->json([
            'success'   => true,
            'message'   => 'Kelompok Tani Deleted'
        ]);
    }

    public function destroy($id)
    {
        DB::select("delete from poktans where id = '$id'");

        return response()->json([
            'success'   => true,
            'message'   => 'Kelompok Tani Deleted'
        ]);
    }
}
