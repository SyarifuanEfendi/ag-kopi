<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class YoutubeController extends Controller
{
    public function index()
    {
        $data = DB::table('youtube')->orderby('id', 'desc')->get();
        return view('be.page.youtube.index',compact('data'));
    }

    public function store(Request $request)
    {
        DB::table('youtube')->insert([
            'link' => $request->link
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Youtube Created'
        ]);
    }

    public function destroy($id)
    {
        DB::select("delete from youtube where id = '$id'");

        return response()->json([
            'success'   => true,
            'message'   => 'Youtube Deleted'
        ]);
    }
}
