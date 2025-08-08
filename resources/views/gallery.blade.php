@extends('layouts.app')

@section('title', 'Galeri - Atakder')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-gallery/1920/600.jpg" alt="Galeri" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri</h1>
            <p class="text-xl max-w-2xl mx-auto">Faaliyetlerimizden Kareler</p>
        </div>
    </section>
    
    <!-- Galeri Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Galeri Öğeleri -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder1/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder1/400/300.jpg" alt="Galeri 1" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder2/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder2/400/300.jpg" alt="Galeri 2" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder3/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder3/400/300.jpg" alt="Galeri 3" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder4/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder4/400/300.jpg" alt="Galeri 4" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder5/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder5/400/300.jpg" alt="Galeri 5" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder6/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder6/400/300.jpg" alt="Galeri 6" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder7/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder7/400/300.jpg" alt="Galeri 7" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder8/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder8/400/300.jpg" alt="Galeri 8" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder9/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder9/400/300.jpg" alt="Galeri 9" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder10/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder10/400/300.jpg" alt="Galeri 10" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder11/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder11/800/600.jpg" alt="Galeri 11" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder12/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder12/400/300.jpg" alt="Galeri 12" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder13/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder13/800/600.jpg" alt="Galeri 13" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder14/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder14/800/600.jpg" alt="Galeri 14" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder15/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder15/800/600.jpg" alt="Galeri 15" class="w-full h-64 object-cover">
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder16/800/600.jpg')">
                    <img src="https://picsum.photos/seed/atakder16/800/600.jpg" alt="Galeri 16" class="w-full h-64 object-cover">
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Lightbox -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="lightbox-close">&times;</span>
    <img id="lightbox-img" src="" alt="">
</div>

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
        
        // Lightbox fonksiyonları
        function openLightbox(imageSrc) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            
            lightboxImg.src = imageSrc;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
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