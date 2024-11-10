<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriBerita;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard(){
        $totalBerita = News::count();

        $latestNews = News::orderBy('published_at', 'desc')
                      ->take(3)
                      ->get()
                      ->map(function ($news) {
                          $news->published_at = \Carbon\Carbon::parse($news->published_at);
                          return $news;
                      });

        return view('admin.dashboard', compact('totalBerita', 'latestNews'));
    }
    public function addnews(){
        $kategoris = Kategori::all();
        return view('admin.addnews', compact('kategoris'));
        
    }
    public function storenews(Request $request){
        // dd($request->all());

        $gambar = $request->file('gambar');
        $fileName = pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME);
        $gambar->move(public_path('/assets/berita/'), $gambar->getClientOriginalName());

        $uuid = Str::uuid()->toString();
        News::create([
            'id_berita' => $uuid,
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'konten' => $request->konten,
            'gambar' => $fileName . '.' . $gambar->getClientOriginalExtension(),
            'nama_author' => $request->nama_author
        ]);
        foreach ($request->kategori as $kategori) {
            KategoriBerita::create([
                'id_berita' => $uuid, 
                'id_kategori' => $kategori,         
            ]);
        }
        ;

        return redirect()->route('list.news')->with('success', 'Berita berhasil ditambahkan');
    }
    public function listnews(){
        $news = News::paginate(3);
        return view('admin.list-news', compact('news'));        
    }
    public function deletenews($id_berita){
        $berita = News::find($id_berita, 'id_berita');
        if ($berita) {
            $berita->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
    public function updateindexnews($id_berita){
        $news = News::where('id_berita', $id_berita)->first();
        $kategoris = Kategori::all();
        $selectedKategoris = KategoriBerita::where('id_berita', $id_berita)->pluck('id_kategori')->toArray();
        return view('admin.update-news', compact('news', 'kategoris', 'selectedKategoris'));
        
    }
    public function updatenews(Request $request, $id_berita){
        $news = News::find($id_berita);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $fileName = pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME);
            
            if ($news->gambar && file_exists(public_path('/assets/berita/' . $news->gambar))) {
                unlink(public_path('/assets/berita/' . $news->gambar));
            }
            $gambar->move(public_path('/assets/berita/'), $gambar->getClientOriginalName());
            $news->gambar = $fileName . '.' . $gambar->getClientOriginalExtension();
        }


        $news->judul = $request->judul;
        $news->subjudul = $request->subjudul;
        $news->konten = $request->konten;
        $news->save();

        KategoriBerita::where('id_berita', $id_berita)->delete();
        foreach ($request->kategori as $kategori) {
            KategoriBerita::create([
                'id_berita' => $id_berita,
                'id_kategori' => $kategori,
            ]);
        }

        return redirect()->route('list.news')->with('success', 'Berita berhasil diperbarui');   
    }
}
