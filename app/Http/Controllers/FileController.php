<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use File;

class FileController extends Controller
{
    public function index()
    {
        $data = DB::table('file')->orderby('id', 'desc')->get();
        return view('be.page.file.index',compact('data'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'file' => 'required|file'
        // ]);

        $tujuan_upload = 'file/pdf';
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        // $nama_file = $file->getClientOriginalName();
        $file->move($tujuan_upload,$nama_file);

        DB::table('file')->insert([
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'file'=>$nama_file
        ]);

        return response()->json([
            'success' => true,
            'message' => 'File Created'
        ]);
    }

    public function destroy($id)
    {
        $cek = DB::select("select * from file where id = '$id'");
        foreach ($cek as $datas => $data) {
            File::delete(public_path("file/pdf/".$data->file));
        }
        DB::select("delete from file where id = '$id'");

        return response()->json([
            'success'   => true,
            'message'   => 'File Deleted'
        ]);
    }
}
