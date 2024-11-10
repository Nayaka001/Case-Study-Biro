@extends('partial.navbar')

@section('content')
@if(session('success'))
    <div id="toast" role="alert" class="fixed top-5 right-14 rounded-2xl border border-gray-100 bg-white p-6 shadow-xl dark:border-gray-800 dark:bg-gray-900 transition duration-700 hidden"> 
        <div class="flex items-start gap-4">
            <span class="text-emerald-600" style="color: green;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            <div class="flex-1">
                <div class="text-center bg-white border-b-0 rounded-t-2xl" style="color: green;">
                    <strong class="block font-medium text-gray-900 dark:text-white">Tambah Berita Berhasil!</strong>
                </div>
                <p class="mt-1 text-sm text-gray-700 dark:text-gray-200" style="color: green;">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif
<div class="mt-6 w-3/4 lg:w-2/4 mx-auto">
    <form action="{{ route('news.update', $news->id_berita) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
        @csrf
        <h2 class="text-xl font-semibold mb-6">Update Berita</h2>
        <label class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="judul" value="{{ $news->judul }}" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" required>

        <label class="block text-sm font-medium text-gray-700">Sub Judul</label>
        <input type="text" name="subjudul" value="{{ $news->subjudul }}" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" required>

        <input type="hidden" name="nama_author" value="{{ Auth::user()->nama }}">

        <label class="block text-sm font-medium text-gray-700">Kategori</label>
        @foreach($kategoris as $kategori)
            <div class="flex items-center mb-2">
                <input type="checkbox" name="kategori[]" value="{{ $kategori->id_kategori }}" id="kategori_{{ $kategori->id_kategori }}"
                    class="mr-2" 
                    @if(in_array($kategori->id_kategori, $selectedKategoris)) checked @endif>
                <label for="kategori_{{ $kategori->id_kategori }}" class="text-sm">{{ $kategori->nama_kategori }}</label>
            </div>
        @endforeach
        @if($news->gambar)
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gambar Berita Saat Ini</label>
                <img src="{{ asset('/assets/berita/' . $news->gambar) }}" alt="Gambar Berita" class="w-32 h-32 object-cover mt-2">
            </div>
        @endif
        <label class="block text-sm font-medium text-gray-700">Gambar Berita</label>
        <input type="file" name="gambar" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" >

        <label class="block text-sm font-medium text-gray-700">Konten Berita</label>
        <textarea id="konten" name="konten" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" rows="10" required>{{ $news->konten }}</textarea>

        <button type="submit" id="submit-dine" class="my-7 bg-[#FFD369] px-5 py-2 rounded-full text-black font-bold font-inter block mx-auto w-full hover:bg-[#f8dea0] focus:ring focus:ring-[#FFD369]">Selanjutnya</button>
    </form>
</div>

<script>
    tinymce.init({
        selector: '#konten',
        setup: function(editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }
    });
</script>
@endsection
