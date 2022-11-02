<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Poktan;

class UsersController extends Controller
{
    public function index()
    {
        $data=User::get();
        return view('be.page.user.index',compact('data'));
    }

    public function show(Request $request)
    {
        # code...
    }

    public function create(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {

        $cek = User::where('username', $request->username)->first();
        if ($cek != null) {
            return response()->json([
                'success' => false,
                'message' => 'Username Sudah Ada'
            ]);
        }

        try {
            User::create([
                'username' => $request->username,
                'name'=> $request->name,
                'role'=> $request->role,
                'password'=> bcrypt('123456')
            ]);
            $userId = DB::getPdo()->lastInsertId();
            Poktan::create([
                'place_name' => $request->name,
                'id_user' => $userId
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Created'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ]);
        }

    }

    public function edit(Request $request, $id)
    {
        $data = User::findOrFail($id);

        return $data;
    }

    public function update(Request $request, $id)
    {
        // $cek = User::where('username', $request->username)->first();
        // if ($cek != null) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Username Sudah Ada'
        //     ]);
        // }

        $data = User::findOrFail($id);
        $data->update([
            'username' => $request->username,
            'name'=> $request->name
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Users Updated'
        ]);
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $data->destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => 'Users Deleted'
        ]);
    }
}
