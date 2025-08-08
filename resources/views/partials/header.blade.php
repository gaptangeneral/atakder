<!-- Header -->
<header class="sticky-header bg-white shadow-md">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="w-16 h-16 flex items-center justify-center rounded-full gradient-primary">
                    <span class="text-white font-bold text-xl">A</span>
                </div>
                <span class="ml-3 text-2xl font-bold text-secondary">Atakder</span>
            </div>
            
            <!-- Desktop Menu -->
            <nav class="desktop-menu hidden md:flex space-x-6">
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
                <a href="{{ route('donation') }}" class="btn-primary text-white px-4 py-2 rounded-lg font-medium">Bağış Yap</a>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-button text-secondary md:hidden" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu hidden mt-4 pb-4">
            <a href="{{ route('home') }}" class="block py-2 text-secondary font-medium">Anasayfa</a>
            
            <div class="py-2">
                <div class="text-secondary font-medium flex justify-between items-center" onclick="toggleMobileDropdown('kurumsal')">
                    Kurumsal <i class="fas fa-chevron-down"></i>
                </div>
                <div id="kurumsal" class="hidden pl-4 mt-2">
                    <a href="{{ route('about') }}" class="block py-1 text-secondary">Hakkımızda</a>
                    <a href="{{ route('account-numbers') }}" class="block py-1 text-secondary">Hesap Numaraları</a>
                    <a href="{{ route('kvkk') }}" class="block py-1 text-secondary">KVKK</a>
                </div>
            </div>
            
            <div class="py-2">
                <div class="text-secondary font-medium flex justify-between items-center" onclick="toggleMobileDropdown('faaliyetler')">
                    Faaliyetlerimiz <i class="fas fa-chevron-down"></i>
                </div>
                <div id="faaliyetler" class="hidden pl-4 mt-2">
                    <a href="{{ route('projects') }}" class="block py-1 text-secondary">Projelerimiz</a>
                    <a href="{{ route('emergency') }}" class="block py-1 text-secondary">Acil durum müdahale</a>
                    <a href="{{ route('search-rescue') }}" class="block py-1 text-secondary">Arama ve Kurtarma</a>
                    <a href="{{ route('online-courses') }}" class="block py-1 text-secondary">Online kurslar</a>
                </div>
            </div>
            
            <a href="{{ route('gallery') }}" class="block py-2 text-secondary font-medium">Galeri</a>
            <a href="{{ route('faq') }}" class="block py-2 text-secondary font-medium">SSS</a>
            <a href="{{ route('contact') }}" class="block py-2 text-secondary font-medium">İletişim</a>
            <a href="{{ route('donation') }}" class="block py-2 btn-primary text-white px-4 py-2 rounded-lg font-medium text-center">Bağış Yap</a>
        </div>
    </div>
</header>