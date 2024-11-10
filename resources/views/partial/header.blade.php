<header class="w-full items-center bg-[#0B6839] py-2 px-6 hidden sm:flex">
  <div class="w-1/2"></div>
  <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
      <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
          <img src="https://png.pngtree.com/element_pic/00/16/10/0957f9d10811e3c.jpg">
      </button>
      <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
      <div x-show="isOpen" class="absolute w-32 bg-[#038A47] hover:bg-[#0B6839] rounded-lg shadow-lg py-2 mt-16">
          <a href="{{route('logout')}}" class="block px-4 py-2 account-link text-white">Sign Out</a>
      </div>
  </div>
</header>
<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
  <div class="flex items-center justify-between">
      <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
      <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
          <i x-show="!isOpen" class="fas fa-bars"></i>
          <i x-show="isOpen" class="fas fa-times"></i>
      </button>
  </div>

  <!-- Dropdown Nav -->
  <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
      <a href="{{route('dashboard')}}" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
          <i class="fas fa-tachometer-alt mr-3"></i>
          Dashboard
      </a>
      <a href="{{route('add.news')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-sticky-note mr-3"></i>
          Add News
      </a>
      <a href="{{route('list.news')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-table mr-3"></i>
          News
      </a>

      <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-sign-out-alt mr-3"></i>
          Sign Out
      </a>
  </nav>
  <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
      <i class="fas fa-plus mr-3"></i> New Report
  </button> -->
</header>