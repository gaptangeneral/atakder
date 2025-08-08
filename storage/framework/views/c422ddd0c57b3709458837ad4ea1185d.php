<!-- Header -->
<header class="sticky-header bg-white shadow-md">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <?php
                    $siteLogo = \App\Models\SiteSetting::get('site_logo');
                    $siteTitle = \App\Models\SiteSetting::get('site_title', 'Atakder');
                ?>
                <a href="<?php echo e(route('home')); ?>" class="flex items-center">
                    <?php if($siteLogo): ?>
                        <img src="<?php echo e(asset('storage/' . $siteLogo)); ?>" alt="Logo" class="logo h-16 w-auto object-contain">
                    <?php else: ?>
                        <span class="text-4xl font-bold text-secondary">A</span>
                    <?php endif; ?>
                    <span class="ml-3 text-2xl font-bold text-secondary"><?php echo e($siteTitle); ?></span>
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <nav class="desktop-menu hidden md:flex space-x-6">
                <!-- Mevcut menü öğeleri -->
                <a href="<?php echo e(route('home')); ?>" class="text-secondary font-medium hover:text-primary transition">Anasayfa</a>
                
                <!-- Kurumsal Dropdown -->
                <div class="dropdown relative">
                    <a href="#" class="text-secondary font-medium hover:text-primary transition flex items-center">
                        Kurumsal <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>
                    <div class="dropdown-content mt-2">
                        <a href="<?php echo e(route('about')); ?>" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Hakkımızda</a>
                        <a href="<?php echo e(route('account-numbers')); ?>" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Hesap Numaraları</a>
                        <a href="<?php echo e(route('kvkk')); ?>" class="block px-4 py-2 hover:bg-gray-100 text-secondary">KVKK</a>
                    </div>
                </div>
                
                <!-- Faaliyetlerimiz Dropdown -->
                <div class="dropdown relative">
                    <a href="#" class="text-secondary font-medium hover:text-primary transition flex items-center">
                        Faaliyetlerimiz <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>
                    <div class="dropdown-content mt-2">
                        <a href="<?php echo e(route('projects')); ?>" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Projelerimiz</a>
                        <a href="<?php echo e(route('emergency')); ?>" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Acil durum müdahale</a>
                        <a href="<?php echo e(route('search-rescue')); ?>" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Arama ve Kurtarma</a>
                        <a href="<?php echo e(route('online-courses')); ?>" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Online kurslar</a>
                    </div>
                </div>
                
                <a href="<?php echo e(route('gallery')); ?>" class="text-secondary font-medium hover:text-primary transition">Galeri</a>
                <a href="<?php echo e(route('faq')); ?>" class="text-secondary font-medium hover:text-primary transition">SSS</a>
                <a href="<?php echo e(route('contact')); ?>" class="text-secondary font-medium hover:text-primary transition">İletişim</a>
                
                <?php if(Auth::guard('admin')->check()): ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-secondary font-medium hover:text-primary transition">
                    <i class="fas fa-tachometer-alt mr-1"></i> Admin Panel
                </a>
                <?php else: ?>
                <a href="<?php echo e(route('admin.login')); ?>" class="text-secondary font-medium hover:text-primary transition">
                    <i class="fas fa-lock mr-1"></i> Admin
                </a>
                <?php endif; ?>
                
                <a href="<?php echo e(route('donation')); ?>" class="btn-primary text-white px-4 py-2 rounded-lg font-medium">Bağış Yap</a>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-button text-secondary md:hidden" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu hidden mt-4 pb-4">
            <!-- Mevcut mobil menü öğeleri -->
        </div>
    </div>
</header><?php /**PATH C:\xampp\htdocs\atakder\resources\views/partials/header.blade.php ENDPATH**/ ?>