@extends('layouts.app')

@section('title', 'Atakder - Acil Yardım ve Arama Kurtarma Derneği')

@section('content')
    <!-- Hero Section -->
    @include('partials.hero')
    
    <!-- Galeri Section -->
    @include('partials.gallery')
    
    <!-- Projelerimiz Section -->
    @include('partials.projects')
    
    <!-- Sıkça Sorulan Sorular Section -->
    @include('partials.faq')
@endsection

@section('scripts')
    <script>
        // Mobil menü aç/kapat
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }
        
        // Mobil dropdown aç/kapat
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
        
        // Slider fonksiyonları
        document.addEventListener('DOMContentLoaded', function() {
            let currentSlide = 0;
            const slider = document.getElementById('projectSlider');
            const slides = document.querySelectorAll('.slider-item');
            const totalSlides = slides.length;
            const indicators = document.querySelectorAll('.slider .flex.justify-center.mt-4.space-x-2 button');
            
            function showSlide(index) {
                if (index < 0) {
                    currentSlide = totalSlides - 1;
                } else if (index >= totalSlides) {
                    currentSlide = 0;
                } else {
                    currentSlide = index;
                }
                
                const offset = -currentSlide * 100;
                slider.style.transform = `translateX(${offset}%)`;
                
                // Indicator'ları güncelle
                indicators.forEach((indicator, i) => {
                    if (i === currentSlide) {
                        indicator.classList.add('bg-primary');
                        indicator.classList.remove('bg-gray-300');
                    } else {
                        indicator.classList.remove('bg-primary');
                        indicator.classList.add('bg-gray-300');
                    }
                });
            }
            
            function nextSlide() {
                showSlide(currentSlide + 1);
            }
            
            function prevSlide() {
                showSlide(currentSlide - 1);
            }
            
            function goToSlide(index) {
                showSlide(index - 1);
            }
            
            // Global fonksiyonlar olarak tanımla
            window.nextSlide = nextSlide;
            window.prevSlide = prevSlide;
            window.currentSlide = goToSlide;
            
            // İlk slide'ı göster
            showSlide(0);
            
            // Otomatik slider
            setInterval(nextSlide, 5000);
        });
        
        // FAQ aç/kapat
        function toggleFAQ(button) {
            const faqItem = button.parentElement;
            const icon = button.querySelector('i');
            
            faqItem.classList.toggle('active');
            
            if (faqItem.classList.contains('active')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            } else {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
            }
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