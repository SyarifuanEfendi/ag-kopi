<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = DB::table('artikel')->orderby('id', 'desc')->get();
        return view('be.page.artikel.index', compact('data'));
    }
    public function edit(Request $request, $id)
    {
        $data = artikel::findOrFail($id);

        return $data;
    }
    public function update(Request $request, $id)
    {
        $data = artikel::findOrFail($id);

        $cek = $request->isi;
        $dom = new \DomDocument();
        $dom->loadHtml($cek, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        $cek = $dom->saveHTML();


        if ($data->isi == $request->isi) {
            $description = $data->isi;
        }else {
            $description = $request->isi;
            $dom = new \DomDocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            foreach($images as $k => $img){
                $dataa = $img->getAttribute('src');
                list($type, $dataa) = explode(';', $dataa);
                list(, $dataa)      = explode(',', $dataa);
                $dataa = base64_decode($dataa);

                $image_name= "/file/artikel/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $dataa);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
            $description = $dom->saveHTML();
        }

        if ($request->hasFile('gambar')) {

            $tujuan_upload = 'file/artikel';

            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);

            $data->update([
                'judul'=>$request->judul,
                'slug' => Str::slug($request->judul, '-'),
                'isi'=>$description,
                'gambar'=>$nama_file
            ]);
        }else {
            $data->update([
                'judul'=>$request->judul,
                'slug' => Str::slug($request->judul, '-'),
                'isi'=>$description
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Artikel Updated'
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $description = $request->isi;

        $dom = new \DomDocument();
		$dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		$images = $dom->getElementsByTagName('img');
		$description = $dom->saveHTML();


		foreach($images as $k => $img){
			$dataa = $img->getAttribute('src');
			list($type, $dataa) = explode(';', $dataa);
			list(, $dataa)      = explode(',', $dataa);
			$dataa = base64_decode($dataa);
			$image_name= "/file/artikel/" . time().$k.'.png';
			$path = public_path() . $image_name;
			file_put_contents($path, $dataa);
			$img->removeAttribute('src');
			$img->setAttribute('src', $image_name);
		}

        $user_id = auth()->user()->id;
        $tujuan_upload = 'file/artikel';

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move($tujuan_upload,$nama_file);

        DB::table('artikel')->insert([
            'judul'=>$request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'isi'=>$description,
            'gambar'=>$nama_file
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Artikel Created'
        ]);
    }
    public function detail($id)
    {
        $data = DB::table('artikel')->where('slug', $id)->first();
        return view('fe.blog_detail', compact('data'));
    }
    public function destroy($id)
    {
        $cek = DB::select("select * from artikel where id = '$id'");
        foreach ($cek as $datas => $data) {
            File::delete(public_path("file/artikel/".$data->gambar));
        }
        DB::select("delete from artikel where id = '$id'");

        return response()->json([
            'success'   => true,
            'message'   => 'Artikel Deleted'
        ]);
    }
}
