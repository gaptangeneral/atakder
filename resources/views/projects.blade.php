@extends('layouts.app')

@section('title', 'Projelerimiz - Atakder')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-projects/1920/600.jpg" alt="Projelerimiz" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Projelerimiz</h1>
            <p class="text-xl max-w-2xl mx-auto">Yürüttüğümüz Projeler</p>
        </div>
    </section>
    
    <!-- Projeler Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Proje 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/proje1/800/400.jpg" alt="Proje 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-secondary">Acil Yardım Tırları</h3>
                        <p class="text-gray-600 mb-4">Afet bölgelerine hızlı müdahale için özel olarak tasarlanmış yardım tırlarıyla ihtiyaç sahiplerine ulaşıyoruz.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Detaylı Bilgi <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Proje 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/proje2/800/400.jpg" alt="Proje 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-secondary">Arama Kurtarma Eğitimleri</h3>
                        <p class="text-gray-600 mb-4">Profesyonel ekiplerimizle afet anında doğru müdahale için arama kurtarma eğitimleri düzenliyoruz.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Detaylı Bilgi <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Proje 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/proje3/800/400.jpg" alt="Proje 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-secondary">Geçici Barınma Merkezleri</h3>
                        <p class="text-gray-600 mb-4">Afetzedeler için güvenli ve hijyenik geçici barınma merkezleri kurarak temel ihtiyaçlarını karşılıyoruz.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Detaylı Bilgi <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Mobil menü fonksiyonları
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }
        
        function toggleMobileDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }
        
        // Header scroll efekti
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.sticky-header');
            if (window.scrollY > 100) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }
        });
    </script>
@endsection