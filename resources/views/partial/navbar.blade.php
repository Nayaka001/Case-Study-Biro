<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <script src="https://cdn.tiny.cloud/1/m7yrv1iyrrqawywx5tka75d1h0mf3w1aelr9odbnpmvq0cu2/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
        selector: '#konten',
        setup: function(editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
    });
    </script>
    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #038A47; }
        .cta-btn { color: #038A47; }
        .active-nav-link { background: #0B6839; }
        .nav-item:hover { background: #0B6839; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="fixed bg-sidebar h-screen w-64 hidden  sm:block shadow-xl">
        <div class="p-6 justify-center">
            <a href="{{route('dashboard')}}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <a href="{{route('add.news')}}" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-sticky-note mr-3"></i> Add News
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('dashboard')}}" class="flex items-center  {{ request()->routeIs('dashboard') ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{route('list.news')}}" class="flex items-center {{ request()->routeIs('list.news') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                News
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-full overflow-y-hidden bg-red sm:ml-64">
      @include('partial.header')
        <!-- Desktop Header -->

        <!-- Mobile Header & Nav -->
    
        @yield('content')
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    
</body>
</html>
