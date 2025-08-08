<!-- Header -->
<header class="sticky-header bg-white shadow-md">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                @php
                    $siteLogo = \App\Models\SiteSetting::get('site_logo');
                    $siteTitle = \App\Models\SiteSetting::get('site_title', 'Atakder');
                @endphp
                <a href="{{ route('home') }}" class="flex items-center">
                    @if($siteLogo)
                        <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo" class="logo h-16 w-auto object-contain">
                    @else
                        <span class="text-4xl font-bold text-secondary">A</span>
                    @endif
                    <span class="ml-3 text-2xl font-bold text-secondary">{{ $siteTitle }}</span>
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <nav class="desktop-menu hidden md:flex space-x-6">
                <!-- Mevcut menü öğeleri -->
                <a href="{{ route('home') }}" class="text-secondary font-medium hover:text-primary transition">Anasayfa</a>
                
                <!-- Kurumsal Dropdown -->
                <div class="dropdown relative">
                    <a href="#" class="text-secondary font-medium hover:text-primary transition flex items-center">
                        Kurumsal <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>
                    <div class="dropdown-content mt-2">
                        <a href="{{ route('about') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Hakkımızda</a>
                        <a href="{{ route('account-numbers') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Hesap Numaraları</a>
                        <a href="{{ route('kvkk') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">KVKK</a>
                    </div>
                </div>
                
                <!-- Faaliyetlerimiz Dropdown -->
                <div class="dropdown relative">
                    <a href="#" class="text-secondary font-medium hover:text-primary transition flex items-center">
                        Faaliyetlerimiz <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>
                    <div class="dropdown-content mt-2">
                        <a href="{{ route('projects') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Projelerimiz</a>
                        <a href="{{ route('emergency') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Acil durum müdahale</a>
                        <a href="{{ route('search-rescue') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Arama ve Kurtarma</a>
                        <a href="{{ route('online-courses') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Online kurslar</a>
                    </div>
                </div>
                
                <a href="{{ route('gallery') }}" class="text-secondary font-medium hover:text-primary transition">Galeri</a>
                <a href="{{ route('faq') }}" class="text-secondary font-medium hover:text-primary transition">SSS</a>
                <a href="{{ route('contact') }}" class="text-secondary font-medium hover:text-primary transition">İletişim</a>
                
                @if(Auth::guard('admin')->check())
                <a href="{{ route('admin.dashboard') }}" class="text-secondary font-medium hover:text-primary transition">
                    <i class="fas fa-tachometer-alt mr-1"></i> Admin Panel
                </a>
                @else
                <a href="{{ route('admin.login') }}" class="text-secondary font-medium hover:text-primary transition">
                    <i class="fas fa-lock mr-1"></i> Admin
                </a>
                @endif
                
                <a href="{{ route('donation') }}" class="btn-primary text-white px-4 py-2 rounded-lg font-medium">Bağış Yap</a>
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
</header>