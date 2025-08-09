<!-- Header -->
<header class="sticky top-0 z-50 bg-white shadow-md transition-all duration-300">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center flex-wrap md:flex-nowrap gap-2">
            <!-- Logo ve Başlık -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2 md:space-x-4 flex-shrink-0">
                @php
                    $siteLogo = \App\Models\SiteSetting::get('site_logo');
                    $secondLogoUrl = asset('icisleribakanlıgılogo.png');
                    $siteTitle = \App\Models\SiteSetting::get('site_title', 'Atakder');
                @endphp

                @if($siteLogo)
                    <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo" class="w-16 md:w-32 max-w-full h-auto object-contain">
                @else
                    <span class="text-3xl md:text-5xl font-bold text-secondary">A</span>
                @endif

                <img src="{{ $secondLogoUrl }}" alt="İkinci Logo" class="w-16 md:w-32 max-w-full h-auto object-contain">

                <span class="text-lg md:text-3xl font-bold text-secondary whitespace-nowrap">{{ $siteTitle }}</span>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-6 items-center flex-shrink-0">
                <a href="{{ route('home') }}" class="text-secondary font-medium hover:text-primary transition">Anasayfa</a>

                <div class="relative dropdown-container">
                    <button class="text-secondary font-medium hover:text-primary transition flex items-center focus:outline-none dropdown-trigger">
                        Kurumsal <i class="fas fa-chevron-down ml-1 text-xs transition-transform dropdown-icon"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible pointer-events-none transition-all duration-200 z-50 dropdown-menu">
                        <a href="{{ route('about') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Hakkımızda</a>
                        <a href="{{ route('account-numbers') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">Hesap Numaraları</a>
                        <a href="{{ route('kvkk') }}" class="block px-4 py-2 hover:bg-gray-100 text-secondary">KVKK</a>
                    </div>
                </div>

                <div class="relative dropdown-container">
                    <button class="text-secondary font-medium hover:text-primary transition flex items-center focus:outline-none dropdown-trigger">
                        Faaliyetlerimiz <i class="fas fa-chevron-down ml-1 text-xs transition-transform dropdown-icon"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-lg opacity-0 invisible pointer-events-none transition-all duration-200 z-50 dropdown-menu">
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
                    <a href="{{ route('admin.dashboard') }}" class="text-secondary font-medium hover:text-primary transition flex items-center">
                        <i class="fas fa-tachometer-alt mr-1"></i> Admin Panel
                    </a>
                @else
                    <a href="{{ route('admin.login') }}" class="text-secondary font-medium hover:text-primary transition flex items-center">
                        <i class="fas fa-lock mr-1"></i> Admin
                    </a>
                @endif

                <a href="{{ route('donation') }}" class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-yellow-500 transition">Bağış Yap</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-secondary text-2xl flex-shrink-0 p-2" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden mt-4 pb-4 md:hidden">
            <div class="flex flex-col space-y-3 border-t border-gray-200 pt-4">
                <a href="{{ route('home') }}" class="text-secondary font-medium hover:text-primary transition py-2">Anasayfa</a>
                
                <details class="group">
                    <summary class="cursor-pointer text-secondary font-medium hover:text-primary transition flex items-center justify-between py-2">
                        Kurumsal
                        <i class="fas fa-chevron-down ml-2 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="pl-4 mt-2 flex flex-col space-y-2 border-l-2 border-gray-200">
                        <a href="{{ route('about') }}" class="text-secondary hover:text-primary transition py-1">Hakkımızda</a>
                        <a href="{{ route('account-numbers') }}" class="text-secondary hover:text-primary transition py-1">Hesap Numaraları</a>
                        <a href="{{ route('kvkk') }}" class="text-secondary hover:text-primary transition py-1">KVKK</a>
                    </div>
                </details>

                <details class="group">
                    <summary class="cursor-pointer text-secondary font-medium hover:text-primary transition flex items-center justify-between py-2">
                        Faaliyetlerimiz
                        <i class="fas fa-chevron-down ml-2 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="pl-4 mt-2 flex flex-col space-y-2 border-l-2 border-gray-200">
                        <a href="{{ route('projects') }}" class="text-secondary hover:text-primary transition py-1">Projelerimiz</a>
                        <a href="{{ route('emergency') }}" class="text-secondary hover:text-primary transition py-1">Acil durum müdahale</a>
                        <a href="{{ route('search-rescue') }}" class="text-secondary hover:text-primary transition py-1">Arama ve Kurtarma</a>
                        <a href="{{ route('online-courses') }}" class="text-secondary hover:text-primary transition py-1">Online kurslar</a>
                    </div>
                </details>

                <a href="{{ route('gallery') }}" class="text-secondary font-medium hover:text-primary transition py-2">Galeri</a>
                <a href="{{ route('faq') }}" class="text-secondary font-medium hover:text-primary transition py-2">SSS</a>
                <a href="{{ route('contact') }}" class="text-secondary font-medium hover:text-primary transition py-2">İletişim</a>

                @if(Auth::guard('admin')->check())
                    <a href="{{ route('admin.dashboard') }}" class="text-secondary font-medium hover:text-primary transition flex items-center py-2">
                        <i class="fas fa-tachometer-alt mr-1"></i> Admin Panel
                    </a>
                @else
                    <a href="{{ route('admin.login') }}" class="text-secondary font-medium hover:text-primary transition flex items-center py-2">
                        <i class="fas fa-lock mr-1"></i> Admin
                    </a>
                @endif

                <a href="{{ route('donation') }}" class="bg-primary text-white px-4 py-3 rounded-lg font-medium hover:bg-yellow-500 transition text-center mt-2">Bağış Yap</a>
            </div>
        </div>
    </div>
</header>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}

// Dropdown menü kontrolleri
document.addEventListener('DOMContentLoaded', function() {
    const dropdownContainers = document.querySelectorAll('.dropdown-container');
    
    dropdownContainers.forEach(container => {
        const trigger = container.querySelector('.dropdown-trigger');
        const menu = container.querySelector('.dropdown-menu');
        const icon = container.querySelector('.dropdown-icon');
        let timeout;

        // Mouse enter olayı
        container.addEventListener('mouseenter', function() {
            clearTimeout(timeout);
            menu.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
            menu.classList.add('opacity-100', 'visible', 'pointer-events-auto');
            icon.style.transform = 'rotate(180deg)';
        });

        // Mouse leave olayı
        container.addEventListener('mouseleave', function() {
            timeout = setTimeout(() => {
                menu.classList.add('opacity-0', 'invisible', 'pointer-events-none');
                menu.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
                icon.style.transform = 'rotate(0deg)';
            }, 100);
        });

        // Dropdown menü içinde mouse varken kapatma
        menu.addEventListener('mouseenter', function() {
            clearTimeout(timeout);
        });

        menu.addEventListener('mouseleave', function() {
            timeout = setTimeout(() => {
                menu.classList.add('opacity-0', 'invisible', 'pointer-events-none');
                menu.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
                icon.style.transform = 'rotate(0deg)';
            }, 100);
        });
    });
});

// Mobil menüyü kapatmak için dışarı tıklama
document.addEventListener('click', function(event) {
    const menu = document.getElementById('mobileMenu');
    const menuButton = event.target.closest('button[onclick="toggleMobileMenu()"]');
    
    if (!menu.contains(event.target) && !menuButton && !menu.classList.contains('hidden')) {
        menu.classList.add('hidden');
    }
    
    // Dropdown menüleri kapatmak için dışarı tıklama
    const dropdownContainers = document.querySelectorAll('.dropdown-container');
    dropdownContainers.forEach(container => {
        const menu = container.querySelector('.dropdown-menu');
        const icon = container.querySelector('.dropdown-icon');
        
        if (!container.contains(event.target)) {
            menu.classList.add('opacity-0', 'invisible', 'pointer-events-none');
            menu.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
            icon.style.transform = 'rotate(0deg)';
        }
    });
});
</script>