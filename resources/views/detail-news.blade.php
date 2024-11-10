<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="2xl:mx-[10%]">
    
    <div class="mt-[104px] h-[31px] w-full px-8  flex items-center justify-center md:justify-start  ">
        <div class="">
            <img src="/assets/images/home.png" class="w-3 h-3 xl:w-auto xl:h-auto" alt="">
        </div>
        <div class="text-[#006633] text-[8px] xl:text-base leading-4 font-semibold">
            <a href="/"><p>> Activities > Berita SDGs > USU's Effort to Encourage Student Digital Literacy...</p></a>
        </div>
    </div>
    <div class="p-8  mb-2 bg-[#FAFAFA] md:flex md:items-center md:justify-center 2xl:">
        <div class="md:mr-8 h-auto w-full ">
            <div class="flex justify-start mb-4">
                <p class="text-xl xl:text-3xl  font-semibold text-[#0B6839]">{{$details->judul}}</p>
            </div>
            <div class="flex gap-x-6 mb-8 md:mb-0">
                <div>
                    <div class="text-[6px] leading-[7px] xl:text-[8px] xl:leading-[9.4px] text-[#556371] font-normal">Dipublish Pada</div>
                    <div class="text-[8px] leading-[9.4px] xl:text-[10px] xl:leading-[11.75px] text-[#556371] font-semibold">{{ \Carbon\Carbon::parse($details->published_at)->locale('id')->translatedFormat('l, d F Y') }}
                    </div>
                </div>
                <div>
                    <div class="text-[6px] leading-[7px] xl:text-[8px] xl:leading-[9.4px] text-[#556371] font-normal">Dipublish oleh</div>
                    <div class="text-[8px] leading-[9.4px] xl:text-[10px] xl:leading-[11.75px] text-[#556371] font-semibold">{{$details->nama_author}}</div>
                </div>
            </div>
        </div>
        <div class="w-full h-auto  ">
            <div class="mb-[10px] flex flex-col items-center">
                <img src="{{ asset('assets/berita/' . $details->gambar) }}" class="w-full h-fit" alt="">
            </div>

        </div>
    </div>
    <div class="mx-[5%] md:flex md:mt-5 md:justify-center md:relative mb-[64.56px] xl:mb-[64.47px]">
        <div class="flex justify-between items-center mx-[30%] md:mx-0 md:space-y-4 md:flex-col md:w-[62px] md:items-start md:mb-0 md:h-fit md:absolute md:left-0 md:justify-center md:ml-[2%] md:mt-[2%] ">
            <a href="">
                <img src="/assets/images/simbol.png" class="w-auto h-auto md:ml-5 md:mx-auto" alt="Simbol">
            </a>
            <a href="/https://www.x.com/">
                <img src="/assets/images/x.png" class="w-auto h-auto  md:ml-5 md:mx-auto" alt="Ikon X">
            </a>
            <a href="/https://www.instagram.com/">
                <img src="/assets/images/instagram.png" class="w-auto h-auto  md:ml-5 md:mx-auto" alt="Ikon Instagram">
            </a>
            <a href="/https://www.facebook.com/">
                <img src="/assets/images/facebook.png" class="w-auto h-auto  md:ml-5 md:mx-auto" alt="Ikon Facebook">
            </a>
        </div>
        <div class="mx-8 mt-[90px] md:mt-5 md:w-3/4 ">
            <div class="text-xl text-[#556371] font-light mb-4">{{$details->subjudul}}</div>
            <div class="text-[#556371] font-normal">{!!$details->konten!!}</div>
            <div class="w-full h-[2px] bg-[#FAFAFA] mt-6 mb-6">
            </div>
            <div class="flex gap-x-3">
                @foreach ($details->kategoriberita as $kategori)
                <div class="w-fit bg-[#39A9354D] p-[6px] rounded">
                <p class="text-[#0B6839] font-semibold text-sm ">{{$kategori->kategori->nama_kategori}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-[#FAFAFA] w-full h-[375px] sm:h-[175px] xl:h-[175px]">
        <div class="flex text-[#556371] justify-center items-center h-[41px] xl:text-[10px] xl:leading-[11.75px] xl:font-semibold">
            <div class="text-[8px] leading-[9.4px] ">Find Other News</div>
        </div>
        <div class="sm:flex justify-between xl:flex">
            @foreach($randomNews as $news)
            <div class="px-8 pb-8 pt-4 flex-1">
                <a href="{{ route('detail.berita', $news->id_berita) }}">
                    <div class="mb-2 text-[#556371] text-[8px] leading-[16px]">{{$news->judul}}</div>
                    <div class="text-[#556371] text-[14px] leadong-[22.4px] font-light">{{$news->subjudul}}</div>
                </a>
            </div>
            @endforeach
        </div>
        
    </div>
    
    
</body>
</html>