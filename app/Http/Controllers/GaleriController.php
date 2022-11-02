<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Galeri;
use File;

class GaleriController extends Controller
{
    public function index()
    {
        $data = DB::table('galeri')->orderby('id', 'desc')->get();
        return view('be.page.galeri.index',compact('data'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'gambar' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $tujuan_upload = 'file/galeri';

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move($tujuan_upload,$nama_file);

        DB::table('galeri')->insert([
            'gambar'=>$nama_file
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Galeri Created'
        ]);
    }

    public function destroy($id)
    {
        $cek = DB::select("select * from galeri where id = '$id'");
        foreach ($cek as $datas => $data) {
            File::delete(public_path("file/galeri/".$data->gambar));
        }
        DB::select("delete from galeri where id = '$id'");

        return response()->json([
            'success'   => true,
            'message'   => 'Galeri Deleted'
        ]);
    }
}
