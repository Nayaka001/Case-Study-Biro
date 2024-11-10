<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center items-center bg-[#FAFAFA] h-screen">
        <div class="border mx-auto w-96 h-auto p-6 bg-white">
            <div class="flex justify-start">
                <p class="text-xl font-bold">Hello, Welcome Admin</p class="text-3xl font-semibold">
            </div>
            <div class="h-[1px] w-full bg-gray-300 mt-4">
            </div>
            <form action="{{ route('login') }}" method="POST">
                <div class="space-y-3 mt-5">
                    @csrf
                    <div class=" w-full h-auto space-y-1">
                        <label for="email" class="font-semibold text-xs lg:text-base">Email</label>
                        <div class="h-[32px] w-full relative flex items-center">
                            <img src="assets/images/email.png" class="absolute ml-2 h-6 w-6 " alt="">
                            <input class="border border-[#A8A8A8] focus:border-[#A8A8A8]  placeholder:text-[8px] placeholder:font-medium lg:placeholder:text-base lg:text-base text-[10px] leading-[15px] font-medium rounded-[4px] w-full py-2 pl-10 pr-4 " id="email" name="email" type="text" placeholder="Masukkan Email">
                        </div>
                    </div>
                    <div class="w-full h-auto space-y-1 ">
                        <label class="font-semibold text-xs lg:text-base" for="password">Password</label>
                        <div class="h-[32px]  w-full relative flex items-center ">
                            <img src="assets/images/lock.png" class="absolute ml-[10px] h-5 w-5 " alt="">
                            <input class="border border-[#A8A8A8] focus:border-[#A8A8A8] placeholder:text-[8px] placeholder:font-medium lg:placeholder:text-base lg:text-base text-[10px] leading-[15px] font-medium rounded-[4px] w-full py-2 pl-10 pr-4" type="password" id="password" name="password" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="w-full h-auto flex items-center justify-end space-x-2 ">
                        <label for="remember" class="text-xs">Remember Me</label>
                        <input type="checkbox" id="remember">
                    </div>
                    <div class="w-full  flex justify-center items-center">
                        <button class="w-full bg-[#0B6839] py-2 px-4 rounded-md text-white font-semibold mb-6">
                            Login
                        </button>
                    </div> 
                </div>
            </form>               
            <div>

            </div>
            
        </div>
    </div>
</body>
</html>