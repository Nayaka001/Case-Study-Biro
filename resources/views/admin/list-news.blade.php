@extends('partial.navbar')

@section('content')    
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4 ml-4">Daftar Berita</h1>
    
    <div id="deleteModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-0 sm:w-auto">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center sm:text-left">Konfirmasi Hapus</h2>
            <p class="text-gray-600 text-center sm:text-left">Apakah Anda yakin ingin menghapus data ini?</p>
            
            <div class="flex flex-col sm:flex-row justify-end mt-6 space-y-3 sm:space-y-0 sm:space-x-3">
                <button type="button" id="cancelDelete" onclick="hideModal()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</button>
                
                <!-- Form delete -->
                <form id="deleteForm" action="{{ route('news.delete', ['id_berita' => ':id_berita']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 w-full text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
                </form>
            </div>
        </div>
    </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Gambar</th>
                        <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Judul</th>
                        <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Subjudul</th>
                        <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Konten</th>
                        <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Published</th>
                        <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $new)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">
                            <img src="{{ asset('assets/berita/' . $new->gambar) }}" alt="Gambar Berita" class="w-16 h-10">
                        </td>
                        <td class="py-3 px-4 text-sm text-gray-900">{{ $new->judul }}</td>
                        <td class="py-3 px-4 text-sm text-gray-900">{{ $new->subjudul }}</td>
                        <td class="py-3 px-4 text-sm text-gray-900 truncate max-w-xs">{!! strip_tags($new->konten, '<p>') !!}</td>
                        <td class="py-3 px-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($new->published_at)->format('d F Y') }}</td>
                        <td class="py-3 px-4 text-sm text-gray-900 flex items-center justify-center space-x-2">
                            <a href="{{route('news.updateindex', $new->id_berita)}}"><button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Update</button></a>
                            <button class="bg-red-500 text-white px-3 py-1 rounded delete-button" data-id="{{ $new->id_berita }}">Delete</button>
                        </td>                  
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-8 w-full flex justify-center mb-8">
        {{ $news->links('vendor.pagination') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var deleteModal = document.getElementById('deleteModal');
        var deleteButtons = document.querySelectorAll('.delete-button');
        var deleteForm = document.getElementById('deleteForm');
        var cancelDelete = document.getElementById('cancelDelete');

        function showModal() {
            deleteModal.style.display = "flex";
        }

        function hideModal() {
            deleteModal.style.display = "none";
        }
        
        cancelDelete.onclick = function() {
            hideModal();
        };

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var id_berita = this.getAttribute('data-id');
                var action = '{{ route('news.delete', ['id_berita' => ':id_berita']) }}';
                action = action.replace(':id_berita', id_berita);
                deleteForm.setAttribute('action', action);
                showModal();
            });
        });
    });
</script>
@endsection
