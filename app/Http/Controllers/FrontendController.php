<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sip;
use App\Models\sipp;
use App\Models\nkv;
use App\Models\Comment;

class FrontendController extends Controller
{
    public function index()
    {
        $data = DB::table('artikel')->orderby('id', 'desc')->get();
        return view('fe/blog', compact('data'));
    }
    public function galeri()
    {
        $data = DB::table('galeri')->orderby('id', 'desc')->get();
        return view('fe/galeri',compact('data'));
    }
    public function youtube()
    {
        $data = DB::table('youtube')->orderby('id', 'desc')->get();
        return view('fe/video',compact('data'));
    }
    public function pdf(Request $request)
    {
        $data = DB::table('file')->orderby('id', 'desc')->get();
        if($request->ajax()){
            $data = DB::table('file')->orderby('id', 'desc')->paginate(10);
             return response()->json(['data' => $data]);
          }
        return view('fe/file',compact('data'));
    }
    public function file()
    {
        $data = DB::table('comments')->where('konten','file')->orderby('id', 'desc')->get();
        return view('fe/file', compact('data'));
    }
    public function detail($id)
    {
        $data = DB::table('artikel')->where('slug', $id)->first();
        return view('fe/blog_detail', compact('data'));
    }
    public function alur()
    {
        return view('alur');
    }
    public function artikel_detail($id)
    {
        $data = DB::table('artikel')->where('slug', $id)->first();
        $post = Comment::all();
        return view('artikel_detail', compact('data','post'));
    }
    public function search(Request $request)
    {
        if ($request->has('nik')) {
            $sip=sip::where('nik',$request->nik)->get();
            $sip1 = "";
            $sipp=sipp::where('nik',$request->nik)->get();
            $sipp1 = "";
            $nkv=nkv::where('nik',$request->nik)->get();
            $nkv1 = "";
            if ( count($sip)>0 ) {
                foreach ($sip as $datas => $data) {
                    $sip1 = $data->status;
                }
            }else {
                $sip1 = "Tidak Ada";
            }
            if ( count($sipp)>0 ) {
                foreach ($sipp as $datas => $data) {
                    $sipp1 = $data->status;
                }
            }else {
                $sipp1 = "Tidak Ada";
            }
            if ( count($nkv)>0 ) {
                foreach ($nkv as $datas => $data) {
                    $nkv1 = $data->status;
                }
            }else{
                $nkv1 = "Tidak Ada";
            }

            $datas = [
                array(
                    "name" => "SIP",
                    "keterangan" => $sip1
                ),
                array(
                    "name" => "SIPP",
                    "keterangan" => $sipp1
                ),
                array(
                    "name" => "NKV",
                    "keterangan" => $nkv1
                ),
            ];
            return $datas;
        }

        return response([]);
    }
    public function show()
    {
        $post = Comment::all();
        return view('fe.contact', compact('post'));
    }
    public function comment(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'username' => 'required',
            'comment' => 'required'
        ]);

        Comment::create([
            'post_id' => '1',
            'konten'=>'komen',
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'username' => $request->username,
            'comment' => $request->comment
        ]);
        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }
}
