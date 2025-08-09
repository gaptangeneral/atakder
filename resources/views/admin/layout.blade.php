<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Özel CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 border-b border-gray-700">
                <div class="flex items-center">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-yellow-500">
                        <span class="text-white font-bold">A</span>
                    </div>
                    <span class="ml-3 text-xl font-bold">Admin Panel</span>
                </div>
            </div>
            
            <nav class="mt-6" x-data="{ 
    activeItem: '{{ request()->path() }}',
    corporateOpen: {{ request()->is('admin/about*') || request()->is('admin/account-numbers*') ? 'true' : 'false' }},
    activitiesOpen: {{ request()->is('admin/projects*') ? 'true' : 'false' }}
}">
    <!-- Mevcut menü öğeleri -->
    <a href="{{ route('admin.dashboard') }}" 
       class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->is('admin/dashboard') ? 'bg-gray-700 text-white' : '' }}">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Anasayfa
    </a>
    
    <a href="{{ route('admin.announcements.index') }}" 
       class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->is('admin/announcements*') ? 'bg-gray-700 text-white' : '' }}">
        <i class="fas fa-bullhorn mr-3"></i>
        Duyurular
    </a>
    
    <a href="{{ route('admin.settings.index') }}" 
       class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->is('admin/settings*') ? 'bg-gray-700 text-white' : '' }}">
        <i class="fas fa-cog mr-3"></i>
        Site Ayarları
    </a>
    
    <a href="{{ route('admin.gallery.index') }}" 
       class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->is('admin/gallery*') ? 'bg-gray-700 text-white' : '' }}">
        <i class="fas fa-images mr-3"></i>
        Galeri Ayarları
    </a>
    
    <!-- Faaliyetlerimiz Dropdown -->
    <div class="relative">
        <button @click="activitiesOpen = !activitiesOpen" 
                class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none {{ request()->is('admin/projects*') ? 'bg-gray-700 text-white' : '' }}"
                :class="{ 'bg-gray-700 text-white': activitiesOpen }">
            <i class="fas fa-tasks mr-3"></i>
            Faaliyetlerimiz
            <i class="fas fa-chevron-down ml-auto transition-transform" :class="{ 'rotate-180': activitiesOpen }"></i>
        </button>
        
        <div x-show="activitiesOpen" 
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="bg-gray-700">
            <a href="{{ route('admin.projects.index') }}" 
               class="block px-4 py-2 pl-10 text-gray-300 hover:bg-gray-600 hover:text-white {{ request()->is('admin/projects*') ? 'bg-gray-600 text-white' : '' }}">
                Projelerimiz
            </a>

            <a href="{{ route('admin.emergency.index') }}" 
   class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->is('admin/emergency*') ? 'bg-gray-700 text-white' : '' }}">
    <i class="fas fa-exclamation-triangle mr-3"></i>
    Acil Durum
</a>
<a href="{{ route('admin.search-rescue.index') }}" 
   class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->is('admin/search-rescue*') ? 'bg-gray-700 text-white' : '' }}">
    <i class="fas fa-search mr-3"></i>
    Arama ve Kurtarma
</a>

<a href="{{ route('admin.online-courses.index') }}" 
   class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->is('admin/online-courses*') ? 'bg-gray-700 text-white' : '' }}">
    <i class="fas fa-graduation-cap mr-3"></i>
    Online Kurslar
</a>
        </div>
    </div>
    
    <!-- Kurumsal Dropdown -->
    <div class="relative">
        <button @click="corporateOpen = !corporateOpen" 
                class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none {{ request()->is('admin/about*') || request()->is('admin/account-numbers*') ? 'bg-gray-700 text-white' : '' }}"
                :class="{ 'bg-gray-700 text-white': corporateOpen }">
            <i class="fas fa-building mr-3"></i>
            Kurumsal
            <i class="fas fa-chevron-down ml-auto transition-transform" :class="{ 'rotate-180': corporateOpen }"></i>
        </button>
        
        <div x-show="corporateOpen" 
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="bg-gray-700">
            <a href="{{ route('admin.about.edit') }}" 
               class="block px-4 py-2 pl-10 text-gray-300 hover:bg-gray-600 hover:text-white {{ request()->is('admin/about*') ? 'bg-gray-600 text-white' : '' }}">
                Hakkımızda
            </a>
            <a href="{{ route('admin.account-numbers.index') }}" 
               class="block px-4 py-2 pl-10 text-gray-300 hover:bg-gray-600 hover:text-white {{ request()->is('admin/account-numbers*') ? 'bg-gray-600 text-white' : '' }}">
                Hesap Numaraları
            </a>
        </div>
    </div>
</nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center p-4">
                    <div>
                        <h1 class="text-xl font-bold">@yield('title')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600"></i>
                                    </div>
                                    <span class="ml-2 text-sm font-medium">{{ Auth::guard('admin')->user()->name }}</span>
                                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                                </div>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false" 
                                 x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Çıkış Yap
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-100 overflow-auto">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>