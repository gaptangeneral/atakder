<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - Atakder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-yellow-500">
                        <span class="text-gray-800 font-bold">A</span>
                    </div>
                    <span class="ml-3 text-xl font-bold">Atakder Admin</span>
                </div>
            </div>
            
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                
                <div class="mt-4">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Site Yönetimi</h3>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-cog mr-3"></i>
                        Site Ayarları
                    </a>
                    <a href="{{ route('admin.pages.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-file-alt mr-3"></i>
                        Sayfalar
                    </a>
                </div>
                
                <div class="mt-4">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">İçerik Yönetimi</h3>
                    <a href="{{ route('admin.announcements.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-bullhorn mr-3"></i>
                        Duyurular
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-images mr-3"></i>
                        Galeri
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-project-diagram mr-3"></i>
                        Projeler
                    </a>
                    <a href="{{ route('admin.faq.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-question-circle mr-3"></i>
                        SSS
                    </a>
                </div>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between p-4">
                    <h1 class="text-xl font-bold text-gray-800">Admin Paneli</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
    
    @yield('scripts')
</body>
</html>