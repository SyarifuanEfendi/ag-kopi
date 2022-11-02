<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->role == 'editor') {
                return redirect()->intended('poktan');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->intended('admin');
                } elseif ($user->role == 'editor') {
                    return redirect()->intended('poktan');
                }
                return redirect()->intended('/');
            }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    // public function loginaksi(Request $request)
    // {
    //     $data = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ];

    //     if (Auth::Attempt($data))
    //     {
    //         $data = DB::table('artikel')->orderby('id', 'desc')->get();
    //         return view('be.page.artikel.index', compact('data'));
    //     }
    //     else
    //     {
    //         Session::flash('error', 'Email atau Password Salah');
    //         return redirect('/');
    //     }
    // }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
