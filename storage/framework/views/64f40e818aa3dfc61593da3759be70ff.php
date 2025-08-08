<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Yeni Galeri Resmi Ekle - <?php echo e(config('app.name', 'Laravel')); ?></title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Özel CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 text-xl font-bold">Admin Panel</div>
            <nav class="mt-5">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="block px-4 py-2 hover:bg-gray-700 <?php echo e(request()->is('admin/dashboard') ? 'bg-gray-700' : ''); ?>">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="<?php echo e(route('admin.gallery.index')); ?>" class="block px-4 py-2 hover:bg-gray-700 <?php echo e(request()->is('admin/gallery*') ? 'bg-gray-700' : ''); ?>">
                    <i class="fas fa-images mr-2"></i> Galeri
                </a>
                <a href="<?php echo e(route('admin.settings.index')); ?>" class="block px-4 py-2 hover:bg-gray-700 <?php echo e(request()->is('admin/settings*') ? 'bg-gray-700' : ''); ?>">
                    <i class="fas fa-cog mr-2"></i> Ayarlar
                </a>
                <!-- Diğer menü öğeleri -->
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center p-4">
                    <div>
                        <h1 class="text-xl font-bold">Yeni Galeri Resmi Ekle</h1>
                    </div>
                    <div>
                        <span><?php echo e(Auth::guard('admin')->user()->name); ?></span>
                        <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="ml-4 text-red-600 hover:text-red-800">Çıkış</button>
                        </form>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Yeni Galeri Resmi Ekle</h2>
                    <a href="<?php echo e(route('admin.gallery.index')); ?>" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-1"></i> Geri Dön
                    </a>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <form action="<?php echo e(route('admin.gallery.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlık</label>
                            <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Resim</label>
                            <input type="file" id="image" name="image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" accept="image/*" required>
                            <p class="mt-1 text-sm text-gray-500">JPEG, PNG, JPG veya GIF formatında, maksimum 2MB.</p>
                        </div>
                        
                        <div class="mb-4">
                            <div class="flex items-center">
                                <input id="show_on_homepage" name="show_on_homepage" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="show_on_homepage" class="ml-2 block text-sm text-gray-900">Anasayfada göster</label>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                            <input type="number" id="order" name="order" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" min="0">
                            <p class="mt-1 text-sm text-gray-500">Boş bırakırsanız otomatik olarak en sona eklenir.</p>
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="<?php echo e(route('admin.gallery.index')); ?>" class="mr-3 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                İptal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">
                                Kaydet
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\atakder\resources\views/admin/gallery/create.blade.php ENDPATH**/ ?>