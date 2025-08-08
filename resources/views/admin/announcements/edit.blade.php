<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Duyuru Düzenle - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 text-xl font-bold">Admin Panel</div>
            <nav class="mt-5">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.announcements.index') }}" class="block px-4 py-2 hover:bg-gray-700 bg-gray-700">
                    <i class="fas fa-bullhorn mr-2"></i> Duyurular
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="block px-4 py-2 hover:bg-gray-700">
                    <i class="fas fa-images mr-2"></i> Galeri
                </a>
                <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 hover:bg-gray-700">
                    <i class="fas fa-cog mr-2"></i> Ayarlar
                </a>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center p-4">
                    <div>
                        <h1 class="text-xl font-bold">Duyuru Düzenle</h1>
                    </div>
                    <div>
                        <span>{{ Auth::guard('admin')->user()->name }}</span>
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="ml-4 text-red-600 hover:text-red-800">Çıkış</button>
                        </form>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 p-6">
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Duyuru Düzenle</h2>
                    <a href="{{ route('admin.announcements.index') }}" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-1"></i> Geri Dön
                    </a>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlık *</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $announcement->title) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror" 
                                   required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">İçerik *</label>
                            <textarea id="content" name="content" rows="6" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror" 
                                      required>{{ old('content', $announcement->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <div class="flex items-center">
                                <input id="is_active" name="is_active" type="checkbox" value="1" 
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                       {{ old('is_active', $announcement->is_active) ? 'checked' : '' }}>
                                <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktif olarak yayınla</label>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                            <input type="number" id="order" name="order" value="{{ old('order', $announcement->order) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                   min="0">
                        </div>

                        <!-- Oluşturulma ve güncellenme tarihleri -->
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Duyuru Bilgileri</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <strong>Oluşturulma:</strong> {{ $announcement->created_at->format('d.m.Y H:i') }}
                                </div>
                                <div>
                                    <strong>Son Güncelleme:</strong> {{ $announcement->updated_at->format('d.m.Y H:i') }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="{{ route('admin.announcements.index') }}" class="mr-3 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                İptal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">
                                Güncelle
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>