@extends('partial.navbar')

@section('content')
<div class="container mx-auto  py-8 space-y-8">
    <!-- Kotak Total Berita -->
    <div class="bg-[#0B6839] mx-8 text-white p-6 rounded-lg flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Total Berita</h2>
            <p class="text-4xl">{{ $totalBerita }}</p>
        </div>

    </div>

    <!-- Daftar Berita Terbaru -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Berita Terbaru</h2>
        <ul class="space-y-4">
            @foreach ($latestNews as $news)
                <li class="p-4 bg-gray-100 rounded-lg flex items-start space-x-4">
                    <div class="w-16 h-16 bg-gray-300 rounded-lg flex-shrink-0">
                        @if ($news->gambar)
                            <img src="{{ asset('/assets/berita/' . $news->gambar) }}" alt="news image" class="w-full h-full object-cover rounded-lg">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 7h18M3 11h18M3 15h18M3 19h18" />
                            </svg>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $news->judul }}</h3>
                        <p class="text-gray-600 text-sm">{{ \Illuminate\Support\Str::limit($news->deskripsi, 100) }}</p>
                        <small class="text-gray-500">Published on {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}</small>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
