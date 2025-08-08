<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center">
    @php
        $heroBackground = \App\Models\SiteSetting::get('hero_background');
        $heroLogo = \App\Models\SiteSetting::get('hero_logo');
        $heroTitle = \App\Models\SiteSetting::get('hero_title', 'Atakder');
        $heroSubtitle = \App\Models\SiteSetting::get('hero_subtitle', 'Acil Yardım ve Arama Kurtarma Derneği');
    @endphp
    
    <div class="absolute inset-0">
        @if($heroBackground)
            <img src="{{ asset('storage/' . $heroBackground) }}" alt="Hero Background" class="w-full h-full object-cover">
        @else
            <img src="https://picsum.photos/seed/atakder-hero/1920/1080.jpg" alt="Hero Background" class="w-full h-full object-cover">
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/70"></div>
    </div>
    
    <div class="relative z-10 text-center text-white px-4">
        <!-- Hero Logo - Sabit Boyut: 588x250px -->
        @if($heroLogo)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $heroLogo) }}" alt="Hero Logo" class="hero-logo">
            </div>
        @else
            @php
                $siteLogo = \App\Models\SiteSetting::get('site_logo');
            @endphp
            @if($siteLogo)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo" class="hero-logo">
                </div>
            @else
                <div class="mb-6">
                    <span class="text-6xl font-bold text-secondary">A</span>
                </div>
            @endif
        @endif
        
        <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $heroTitle }}</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">{{ $heroSubtitle }}</p>
        <p class="text-lg md:text-xl mb-10 max-w-2xl mx-auto italic">"Umudun Adresi, Yardımın Elleri"</p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('donation') }}" class="btn-primary text-secondary px-8 py-3 rounded-lg font-bold text-lg">Bağış Yap</a>
            <a href="{{ route('register') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-bold text-lg hover:bg-white hover:text-secondary transition">Üye Ol</a>
        </div>
    </div>
</section>