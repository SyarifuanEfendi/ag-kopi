<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class KomenController extends Controller
{
    public function index()
    {
        $post= Comment::get();
        return view('be.page.komentar.index',compact('post'));
    }

    public function destroy($id)
    {
        DB::select("delete from comments where id = '$id'");
        DB::select("delete from comments where parent_id = '$id'");

        return response()->json([
            'success'   => true,
            'message'   => 'Komentar Deleted'
        ]);
    }
}
