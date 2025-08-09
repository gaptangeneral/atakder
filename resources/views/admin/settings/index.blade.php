<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Site Ayarları - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Özel CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 text-xl font-bold">Admin Panel</div>
            <nav class="mt-5">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->is('admin/dashboard') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->is('admin/gallery*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-images mr-2"></i> Galeri
                </a>
                <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->is('admin/settings*') ? 'bg-gray-700' : '' }}">
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
                        <h1 class="text-xl font-bold">Site Ayarları</h1>
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
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Site Ayarları</h2>
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Site Title -->
                            <div>
                                <label for="site_title" class="block text-sm font-medium text-gray-700 mb-2">Site Başlığı</label>
                                <input type="text" id="site_title" name="site_title" value="{{ $settings['site_title'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            </div>
                            
                            <!-- Site Description -->
                            <div>
                                <label for="site_description" class="block text-sm font-medium text-gray-700 mb-2">Site Açıklaması</label>
                                <textarea id="site_description" name="site_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $settings['site_description'] ?? '' }}</textarea>
                            </div>
                            
                            <!-- Site Logo -->
                            <div>
                                <label for="site_logo" class="block text-sm font-medium text-gray-700 mb-2">Site Logosu</label>
                                @if(isset($settings['site_logo']) && $settings['site_logo'])
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Site Logo" class="h-16 w-16 object-contain">
                                    </div>
                                @endif
                                <input type="file" id="site_logo" name="site_logo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" accept="image/*">
                            </div>
                            
                            <!-- Site Favicon -->
                            <div>
                                <label for="site_favicon" class="block text-sm font-medium text-gray-700 mb-2">Site Favicon</label>
                                @if(isset($settings['site_favicon']) && $settings['site_favicon'])
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $settings['site_favicon']) }}" alt="Site Favicon" class="h-16 w-16 object-contain">
                                    </div>
                                @endif
                                <input type="file" id="site_favicon" name="site_favicon" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" accept="image/*">
                            </div>
                            
                            <!-- Hero Title -->
                            <div>
                                <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-2">Hero Başlığı</label>
                                <input type="text" id="hero_title" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            </div>
                            
                            <!-- Hero Subtitle -->
                            <div>
                                <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 mb-2">Hero Alt Başlığı</label>
                                <input type="text" id="hero_subtitle" name="hero_subtitle" value="{{ $settings['hero_subtitle'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            </div>
                            
                            <!-- Hero Background -->
                            <div>
                                <label for="hero_background" class="block text-sm font-medium text-gray-700 mb-2">Hero Arka Planı</label>
                                @if(isset($settings['hero_background']) && $settings['hero_background'])
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $settings['hero_background']) }}" alt="Hero Background" class="h-16 w-16 object-cover">
                                    </div>
                                @endif
                                <input type="file" id="hero_background" name="hero_background" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" accept="image/*">
                            </div>
                            
                            <!-- Contact Email -->
                            <div>
                                <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">İletişim E-posta</label>
                                <input type="email" id="contact_email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            </div>
                            
                            <!-- Contact Phone -->
                            <div>
                                <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">İletişim Telefon</label>
                                <input type="text" id="contact_phone" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            </div>
                            
                            <!-- Contact Address -->
                            <div class="md:col-span-2">
                                <label for="contact_address" class="block text-sm font-medium text-gray-700 mb-2">İletişim Adresi</label>
                                <textarea id="contact_address" name="contact_address" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ $settings['contact_address'] ?? '' }}</textarea>
                            </div>
                            
                            <!-- Social Media Links -->
                            <div>
                                <label for="social_facebook" class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                                <input type="url" id="social_facebook" name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="social_twitter" class="block text-sm font-medium text-gray-700 mb-2">Twitter</label>
                                <input type="url" id="social_twitter" name="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="social_instagram" class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                                <input type="url" id="social_instagram" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="social_youtube" class="block text-sm font-medium text-gray-700 mb-2">YouTube</label>
                                <input type="url" id="social_youtube" name="social_youtube" value="{{ $settings['social_youtube'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">
                                Ayarları Kaydet
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>