@extends('partial.navbar')

@section('content')

<div class="mt-6 w-3/4  lg:w-2/4 mx-auto">
    <form action="{{route('news.store')}}" method="POST" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
        @csrf
        <h2 class="text-xl font-semibold mb-6">Tambah Berita</h2>
        <label class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="judul" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" required>
        <label class="block text-sm font-medium text-gray-700">Sub Judul</label>
        <input type="text" name="subjudul" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" required>
    
        
        <input type="hidden" name="nama_author"  value="{{ Auth::user()->nama }}">
        <label class="block text-sm font-medium text-gray-700">Kategori</label>
        @foreach($kategoris as $kategori)
            <div class="flex items-center mb-2">
                <input type="checkbox" name="kategori[]" value="{{ $kategori->id_kategori }}" id="kategori_{{ $kategori->id_kategori }}" class="mr-2">
                <label for="kategori_{{ $kategori->id_kategori }}" class="text-sm">{{ $kategori->nama_kategori }}</label>
            </div>
        @endforeach

        <label class="block text-sm font-medium text-gray-700">Gambar Berita</label>
        <input type="file" name="gambar" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" required>

        <label class="block text-sm font-medium text-gray-700">Konten Berita</label>
        <textarea id="konten" name="konten" class="mt-1 mb-4 p-2 block w-full border border-gray-300 rounded-md" rows="10" required></textarea>
    
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