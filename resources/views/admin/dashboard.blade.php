<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 border-b border-gray-700">
                <div class="flex items-center">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-yellow-500">
                        <span class="text-white font-bold">A</span>
                    </div>
                    <span class="ml-3 text-xl font-bold">Admin Panel</span>
                </div>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white bg-gray-700 text-white">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                
                <!-- Site Yönetimi Bölümü -->
                <div class="mt-4">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Site Yönetimi</h3>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-cog mr-3"></i>
                        Site Ayarları
                    </a>
                </div>
                
                <!-- İçerik Yönetimi Bölümü -->
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
                    <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-project-diagram mr-3"></i>
                        Projeler
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-question-circle mr-3"></i>
                        SSS
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-newspaper mr-3"></i>
                        Haberler
                    </a>
                </div>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
                    
                    <div class="flex items-center">
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
                            
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
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
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Hoş Geldiniz, {{ Auth::guard('admin')->user()->name }}</h2>
                    <p class="text-gray-600">Admin paneline hoş geldiniz. Aşağıdaki istatistikleri inceleyebilirsiniz.</p>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                                <i class="fas fa-bullhorn text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Aktif Duyurular</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Announcement::where('is_active', true)->count() }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-500">
                                <i class="fas fa-image text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Galeri Resimleri</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Gallery::where('is_active', true)->count() }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                                <i class="fas fa-question-circle text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">SSS</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Faq::where('is_active', true)->count() }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-500">
                                <i class="fas fa-project-diagram text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Projeler</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Project::where('is_active', true)->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Son Aktiviteler</h3>
                    <div class="space-y-4">
                        @php
                            $recentAnnouncements = \App\Models\Announcement::latest()->take(3)->get();
                            $recentGalleries = \App\Models\Gallery::latest()->take(2)->get();
                        @endphp
                        
                        @foreach($recentAnnouncements as $announcement)
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-bullhorn text-blue-500 text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-gray-800">Yeni duyuru eklendi: <span class="font-medium">{{ Str::limit($announcement->title, 50) }}</span></p>
                                <p class="text-xs text-gray-500">{{ $announcement->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                        
                        @foreach($recentGalleries as $gallery)
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                    <i class="fas fa-image text-green-500 text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-gray-800">Yeni galeri resmi eklendi: <span class="font-medium">{{ $gallery->title }}</span></p>
                                <p class="text-xs text-gray-500">{{ $gallery->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>