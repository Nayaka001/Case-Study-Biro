<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\News;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function berita(Request $request){
        $kategoriIds = $request->input('kategori', []);
        $tahun = $request->input('tahun');
        $searchQuery = $request->input('search'); 

        $query = News::with('kategoriberita');
        if (!empty($kategoriIds)) {
            $query->whereHas('kategoriberita', function ($query) use ($kategoriIds) {
                $query->whereIn('id_kategori', $kategoriIds);
            });
        }

        if (!empty($tahun)) {
            $query->whereYear('published_at', $tahun);
        }

        if (!empty($searchQuery)) {
            $query->where('judul', 'like', '%' . $searchQuery . '%');
        }

        $beritas = $query->paginate(3);

        return view('news', compact('beritas'));
    }
  
    public function detailberita(Request $request, $id_berita){
        $details = News::where('id_berita', $id_berita)->with('kategoriberita')->first();
        $randomNews = News::inRandomOrder()->take(3)->get();
        return view('detail-news', compact('details', 'randomNews'));
    }
    
    
}
