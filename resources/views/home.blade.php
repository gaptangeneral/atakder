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

@push('scripts')
<script>
// Global fonksiyonları tanımla
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileMenu) {
        mobileMenu.classList.toggle('hidden');
    }
}

function toggleMobileDropdown(id) {
    const dropdown = document.getElementById(id);
    if (dropdown) {
        dropdown.classList.toggle('hidden');
    }
}

function openLightbox(imageSrc) {
    console.log("Lightbox açılıyor:", imageSrc);
    
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    
    if (!lightbox || !lightboxImg) {
        console.error("Lightbox elementleri bulunamadı!");
        return;
    }
    
    // Resim kaynağını ayarla
    lightboxImg.src = imageSrc;
    
    // Lightbox'ı göster
    lightbox.style.display = 'flex';
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    console.log("Lightbox aktif edildi");
}

function closeLightbox(event) {
    if (event) {
        event.stopPropagation();
    }
    
    console.log("Lightbox kapatılıyor");
    
    const lightbox = document.getElementById('lightbox');
    
    if (!lightbox) {
        console.error("Lightbox elementi bulunamadı!");
        return;
    }
    
    // Lightbox'ı gizle
    lightbox.style.display = 'none';
    lightbox.classList.remove('active');
    document.body.style.overflow = 'auto';
    
    console.log("Lightbox devre dışı edildi");
}

function toggleFAQ(button) {
    const faqItem = button.parentElement;
    const icon = button.querySelector('i');
    
    if (faqItem) {
        faqItem.classList.toggle('active');
        
        if (faqItem.classList.contains('active')) {
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
        } else {
            icon.classList.remove('fa-minus');
            icon.classList.add('fa-plus');
        }
    }
}

// Slider değişkenleri
let currentSlide = 0;
let slider, slides, totalSlides;

function nextSlide() {
    if (!slider) return;
    
    currentSlide++;
    if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }
    
    const offset = -currentSlide * 100;
    slider.style.transform = `translateX(${offset}%)`;
}

function prevSlide() {
    if (!slider) return;
    
    currentSlide--;
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    }
    
    const offset = -currentSlide * 100;
    slider.style.transform = `translateX(${offset}%)`;
}

// DOM yüklendiğinde çalışacak kod
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM yüklendi");
    
    // Slider elementlerini al
    slider = document.getElementById('projectSlider');
    slides = document.querySelectorAll('.slider-item');
    totalSlides = slides.length;
    
    // İlk slide'ı göster
    if (slider) {
        slider.style.transform = 'translateX(0)';
    }
    
    // Otomatik slider
    setInterval(function() {
        nextSlide();
    }, 5000);
    
    // Header scroll efekti
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.sticky-header');
        if (header) {
            if (window.scrollY > 100) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }
        }
    });
    
    // Lightbox için klavye desteği
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
    
    // Lightbox dışına tıklandığında kapatma
    const lightbox = document.getElementById('lightbox');
    if (lightbox) {
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }
    
    console.log("Tüm fonksiyonlar tanımlandı");
});

// Fonksiyonları global olarak tanımla
window.toggleMobileMenu = toggleMobileMenu;
window.toggleMobileDropdown = toggleMobileDropdown;
window.openLightbox = openLightbox;
window.closeLightbox = closeLightbox;
window.toggleFAQ = toggleFAQ;
window.nextSlide = nextSlide;
window.prevSlide = prevSlide;
</script>
@endpush