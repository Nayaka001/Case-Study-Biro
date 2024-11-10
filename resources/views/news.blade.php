<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body >
    <div class="w-full h-[128px] lg:h-[250px] sm:h-[150px] 2xl:[350px] flex relative">
        <div class="w-1/2 h-full absolute end-0">
            <img class="w-full h-full object-cover object-right-top sm:hidden lg:hidden" src="assets/images/berita_mobile.png" alt="">
            <img class="w-full h-full object-cover object-right-top hidden sm:block lg:block" src="assets/images/berita.png" alt="">
        </div>
        <div class="absolute inset-0 h-full w-[75%] lg:w-[75%]   bg-gradient-banner bg-opacity-0 ">
            <div class="ml-8 xl:ml-16 h-full w-full flex items-center relative">
                <div class="absolute flex h-fit items-center inset-y-[18.5px] ">
                    <div class="hidden lg:block">
                        <img src="assets/images/rumah_berita.png" class="lg:w-auto lg:h-auto " alt="">
                    </div>
                    <div class="lg:hidden">
                        <img src="assets/images/home_mobile.png" class="lg:w-auto lg:h-auto " alt="">
                    </div>
                    <div class="text-white text-[8px] lg:text-base leading-4 font-semibold">
                        <p>> Activities > Events</p>
                    </div>
                </div>
                <div class="text-white text-3xl font-semibold lg:text-5xl">
                    <p>Berita SDGs</p>  
                </div>
            </div>
        </div>
    </div>
    <div class="mx-8 mt-8 mb-[41px] lg:mb-[43px] sm:flex lg:mt-16 lg:mx-16 sm:mx-8 lg:flex lg:justify-between h-auto 2xl:mx-[10%]">
        <div class=" lg:w-[75%] sm:w-[70%] sm:mr-4 lg:mr-8 ">
            <div class="lg:flex sm:flex sm:justify-between lg:justify-between  "> 
                <div class="flex w-full sm:justify-between sm:w-full   sm:h-auto lg:justify-between h-auto lg:w-full lg:h-auto ">
                    <div class="lg:flex sm:flex hidden h-8 ">
                        
                        <div class="mr-4 w-full h-auto flex items-center ">
                            <p class=" font-medium whitespace-nowrap text-[12px] leading-[14.1px] xl:leading-[25.6px] xl:text-[14px]">Tahun Rilis</p>
                        </div>
                        
                        <div class="flex-col items-center sm:w-full sm:h-auto lg:h-auto lg:w-full">      
                            <div x-data="{ open: false, selectedYear: '2024' }" class="relative">
                                <!-- Form untuk mengirim data ke Laravel -->
                                <form action="{{ route('berita') }}" method="GET" id="yearForm">
                                    <input type="hidden" name="tahun" :value="selectedYear">
                                </form>
                                <button @click="open = !open" class="flex items-center bg-[#39A9354D] w-full sm:p-2 rounded-[4px]">
                                    <span class="text-[#0B6839] mr-[2px] text-[12px] leading-[14.1px] xl:leading-[16.45px] xl:text-[14px] font-medium" x-text="selectedYear"></span>
                                    <img src="assets/images/dropdown.png" class="w-full h-full object-cover" alt="">
                                </button>
                                <div x-show="open" @click.away="open = false" class="absolute mt-2 w-full bg-white shadow-lg rounded-md">
                                    <ul class="py-1 text-[#0B6839] text-[12px] xl:text-[14px]">
                                        <template x-for="year in [2024, 2023, 2022, 2021, 2020]" :key="year">
                                            <li>
                                                <button type="button" @click="selectedYear = year; open = false; $nextTick(() => document.getElementById('yearForm').submit())" 
                                                        class="block px-4 py-2 hover:bg-[#39A9354D]">
                                                    <span x-text="year"></span>
                                                </button>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class=" w-full h-8 flex xl:w-1/2 sm:w-2/3 1">
                        <form action="{{ route('berita') }}" method="GET" class="w-full h-8 flex ">
                            <div class="h-[32px] w-full lg:w-full sm:w-full relative flex items-center">
                                <img src="assets/images/search.png" class="w-4 h-4 absolute ml-4" alt="">
                                <input class=" border border-[#A8A8A8] focus:border-[#A8A8A8] placeholder:text-right outline outline-1 text-right placeholder:text-[8px] xl:placeholder:text-[10px] text-[8px] leading-[15px] xl:text-[10px] placeholder: outline-[#A8A8A8] mr-2 rounded-[4px] w-full py-2 pl-[36px] pr-4 " 
                                       placeholder="CARI DISINI" type="text" name="search" value="{{ request('search') }}">
                            </div>
                            <div class="flex items-center h-full lg:w-[81px]">
                                <button class="flex items-center h-full bg-[#0B6839] py-2 px-[30.5px] rounded-[4px]">
                                    <span class="text-white text-[8px] leading-[15px] xl:text-[10px]  font-medium">CARI</span>
                                </button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
            <div class="mt-6 mb-4 lg:mt-8 lg:mb-8 sm:mt-6 ">
                @foreach($beritas as $berita)
                <a href="{{route('detail.berita', ['id_berita'=>$berita->id_berita])}}">
                    <div id="beritaContainer" class="px-2  lg:px-4 py-4 lg:py-8 lg:flex lg:grid-cols-none grid grid-cols-2 gap-x-4 lg:gap-x-8 mb-2 lg:items-center lg:bg-[#FAFAFA] lg:rounded-[16px]">
                        <div class="mr-4 w-full lg:w-auto  h-full flex items-center ">
                            <img src="{{ asset('assets/berita/' . $berita->gambar) }}" class="w-[280px] h-[146px] object-cover rounded-lg" alt="Gambar Berita">
                        </div>
                        <div class="w-full h-fit ">
                            <div class="w-full h-auto mb-2 flex ">
                                @foreach($berita->kategoriberita as $kategori)
                                @php
                                    $namaKategori = explode(' ', $kategori->kategori->nama_kategori);
                                    $kategoriRingkas = $namaKategori[0] . ' ' . $namaKategori[1];
                                @endphp
                                <div class="h-fit w-fit rounded-[20px] bg-[#038A47] text-[10px] leading-[9px] xl:text-sm text-white font-bold flex justify-center items-center px-2 py-1 mr-1">
                                    <span class=" sm:hidden">{{ $kategoriRingkas }}</span>
                                    <span class="hidden sm:block">{{$kategori->kategori->nama_kategori}}</span>
                                </div>
                                @endforeach
                            </div>
                            {{-- <div class="w-full h-auto mb-2 flex">
                                @foreach($berita->kategoriberita as $kategori)
                                @php
                                    $namaKategori = explode(' ', $kategori->kategori->nama_kategori);
                                    $kategoriRingkas = $namaKategori[0] . ' ' . $namaKategori[1];
                                @endphp
                                <div class="h-fit w-fit rounded-[20px] bg-[#038A47] text-[8px] leading-[7.05px] xl:text-[12px] xl:leading-[9.4px] text-white font-bold flex justify-center items-center px-2 py-1 mr-1">
                                    <span class=" sm:hidden">{{ $kategoriRingkas }}</span>
                                    <span class="hidden sm:block">{{$kategori->kategori->nama_kategori}}</span>                                    
                                </div>
                                @endforeach
                            </div>                         --}}
                            <div class="w-full h-fit mb-1 lg:mb-2">
                                <h1 class="font-semibold lg:text-xl ">{{ $berita->judul}}</h1>
                            </div>
                            <div class="w-full h-fit mb-1 lg:mb-2">
                                <h1 class="font-semibold lg:text-xl text-[#556371] ">{{ $berita->subjudul}}</h1>
                            </div>
                            <div class="w-full h-fit ">
                                <p class="font-medium text-[10px] lg:text-base text-[#8FA0B1] leading-4">{{\Carbon\Carbon::parse($berita->published_at)->format('d F Y')}}</p>
                            </div>
                        </div>
                    </div>
                </a>
                
                @endforeach
            </div>  
            <div class="mt-8 w-full flex justify-center mb-8">
                {{ $beritas->links('vendor.pagination') }}
            </div> 
        </div>
        
        <div class="w-[1px] h-auto lg:block sm:block hidden bg-[#F6F6F6] mr-8">
        </div>
        <div class="lg:block sm:block hidden h-fit sm:w-[30%] lg:w-[25%] ">
            <div class="w-full h-auto flex justify-between items-center mb-2">
                <p class="text-base font-semibold">Kategori</p>
                <img src="assets/images/row.png" class="w-4 h-4 object-cover" alt="">
            </div>
            <div class="w-full">
                <form action="{{ route('berita') }}" method="GET" id="filterForm">
                    <div class="flex items-center mb-2 w-full">
                        <input type="checkbox" name="kategori[]" id="checkbox1" value="1" class="w-4 h-4 bg-gray-100 border-gray-300 rounded mr-4" {{ in_array(1, request('kategori', [])) ? 'checked' : '' }}>
                        <label for="checkbox1" class="text-[#4A5764] text-base font-normal">TPB 01 Tanpa Kemiskinan</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" name="kategori[]" id="checkbox2" value="2" class="w-4 h-4 bg-gray-100 border-gray-300 rounded mr-4" {{ in_array(2, request('kategori', [])) ? 'checked' : '' }}>
                        <label for="checkbox2" class="text-[#4A5764] text-base font-normal">TPB 02 Tanpa Kelaparan</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" name="kategori[]" id="checkbox3" value="3" class="w-4 h-4 bg-gray-100 border-gray-300 rounded mr-4" {{ in_array(3, request('kategori', [])) ? 'checked' : '' }}>
                        <label for="checkbox3" class="text-[#4A5764] text-base font-normal">TPB 03 Kehidupan Sehat dan Sejahtera</label>
                    </div>
                </form>
                
            </div>
        </div>
        
        
    </div>
    <script>
        document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
            
        });
        document.getElementById('tahunDropdown').addEventListener('change', function() {
            submitForm();
        });
    </script>    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

                    {{-- <div class="hidden lg:flex lg:justify-between lg:w-full ">
                        <div class="flex h-8">
                            <div class="mr-4 flex items-center">
                                <p class="text-[14px] font-medium">Tahun Rilis</p>
                            </div>
                            <button class="flex items-center bg-[#39A9354D] w-[69] h-8 p-2 rounded-[4px]">
                                <span class="text-[#0B6839] mr-[2px] font-medium">2023</span>
                                <img src="assets/images/dropdown.png" class="w-full h-full object-cover" alt="">
                            </button>
                        </div>
                        <div class="w-[311px] h-[32px] lg:w-1/2] flex justify-center items-center ">
                            <div class="h-[32px] w-[222px] lg:w-full relative flex items-center">
                                <img src="assets/images/search.png" class="w-4 h-4 absolute ml-4" alt="">
                                <input class="border border-[#A8A8A8] focus:border-[#A8A8A8] placeholder:text-right outline outline-1 placeholder:text-[8px] text-[10px] leading-[15px] placeholder: outline-[#A8A8A8] mr-2 rounded-[4px] w-full py-2 pl-[36px] pr-4 " placeholder="CARI DISINI" type="text">
                            </div>
                            <div class="flex items-center h-[31px] w-[81px]">
                                <button class="flex items-center bg-[#0B6839] py-2 px-[30.5px] rounded-[4px]">
                                    <span class="text-white text-[8px] mr-[2px] font-medium">CARI</span>
                                </button>
                            </div>
                        </div>
                    </div> --}}