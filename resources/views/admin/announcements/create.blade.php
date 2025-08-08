<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Duyuru Yönetimi - {{ config('app.name', 'Laravel') }}</title>
    
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
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->is('admin/dashboard') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.announcements.index') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->is('admin/announcements*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-bullhorn mr-2"></i> Duyurular
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
                        <h1 class="text-xl font-bold">Duyuru Yönetimi</h1>
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
                    <h2 class="text-2xl font-bold text-gray-800">Duyuru Yönetimi</h2>
                    <a href="{{ route('admin.announcements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                        <i class="fas fa-plus mr-2"></i> Yeni Duyuru Ekle
                    </a>
                </div>
                
                @if($announcements->count() > 0)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Başlık</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İçerik</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durum</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sıra</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tarih</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="announcements-table-body">
                                @foreach($announcements as $announcement)
                                <tr data-id="{{ $announcement->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($announcement->title, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 max-w-xs truncate">{{ Str::limit(strip_tags($announcement->content), 100) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($announcement->is_active)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Pasif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" value="{{ $announcement->order }}" class="order-input w-16 px-2 py-1 border border-gray-300 rounded text-sm" data-id="{{ $announcement->id }}">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $announcement->created_at->format('d.m.Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.announcements.edit', $announcement) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Düzenle</a>
                                        <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Bu duyuruyu silmek istediğinizden emin misiniz?')">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button id="update-order-btn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                        <i class="fas fa-sort mr-2"></i> Sıralamayı Güncelle
                    </button>
                </div>
                @else
                <div class="bg-white rounded-lg shadow p-6 text-center">
                    <i class="fas fa-bullhorn text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Henüz duyuru yok</h3>
                    <p class="text-gray-500 mb-4">İlk duyurunuzu ekleyerek başlayın.</p>
                    <a href="{{ route('admin.announcements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                        <i class="fas fa-plus mr-2"></i> İlk Duyuruyu Ekle
                    </a>
                </div>
                @endif
            </main>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const updateOrderBtn = document.getElementById('update-order-btn');
        
        if (updateOrderBtn) {
            updateOrderBtn.addEventListener('click', function() {
                const orders = [];
                const orderInputs = document.querySelectorAll('.order-input');
                
                orderInputs.forEach(input => {
                    orders.push({
                        id: input.dataset.id,
                        order: parseInt(input.value)
                    });
                });
                
                fetch('{{ route('admin.announcements.updateOrder') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        orders: orders
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert('Bir hata oluştu: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Bir hata oluştu.');
                });
            });
        }
    });
    </script>
</body>
</html>