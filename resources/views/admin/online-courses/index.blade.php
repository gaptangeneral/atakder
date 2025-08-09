@extends('layouts.app')
@section('title', 'Online Kurslar - Atakder')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-courses/1920/600.jpg" alt="Online Kurslar" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Online Kurslar</h1>
            <p class="text-xl max-w-2xl mx-auto">Afete Hazırlık Eğitimleri</p>
        </div>
    </section>
    
    <!-- İçerik Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4 text-secondary">Online Eğitimlerimiz</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Atakder olarak, afetlere karşı toplumu bilinçlendirmek ve hazırlamak amacıyla ücretsiz online eğitim programları düzenliyoruz.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($onlineCourses as $index => $course)
                        <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden animate-slide-up" style="animation-delay: {{ $index * 0.2 }}s">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-2"></div>
                            <div class="p-8">
                                <div class="mb-6">
                                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9 5-9V4h6l9 9-9 5v6l-5 9-9 5v6z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $course->title }}</h3>
                                    <p class="text-gray-600 leading-relaxed">{{ Str::limit($course->content, 150) }}</p>
                                </div>
                                
                                <div class="space-y-4">
                                    @if(!empty($course->duration))
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium">Süre:</span>
                                        <span class="ml-2">{{ $course->duration }}</span>
                                    </div>
                                    @endif
                                    
                                    @if($course->has_certificate)
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium">Sertifika:</span>
                                        <span class="ml-2 text-green-600 font-semibold">✓ Evet</span>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="mt-6">
                                    <a href="#" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800">
                                        Detaylı Bilgi
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <div class="text-gray-400 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 19 7.5 19s3.332-.523 4.5-1.747V6.253z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-gray-700 mb-2">Henüz Kurs Yok</h3>
                            <p class="text-gray-500">Şu anda mevcut bir online kurs bulunmamaktadır.</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="bg-blue-50 rounded-2xl p-8 mt-12">
                    <div class="max-w-3xl mx-auto text-center">
                        <h3 class="text-2xl font-bold mb-4 text-secondary">Eğitim Sürecimiz</h3>
                        <p class="text-gray-600 mb-6">
                            Online eğitimlerimize katılmak çok kolay:
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-blue-600 font-bold">1</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Kayıt</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-blue-600 font-bold">2</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Erişim</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-blue-600 font-bold">3</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Eğitim</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-blue-600 font-bold">4</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Sınav</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-blue-600 font-bold">5</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Sertifika</p>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium inline-block transition duration-300">
                                Kayıt Ol
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    @keyframes slide-up {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-slide-up {
        animation: slide-up 0.6s ease-out forwards;
    }
</style>
@endpush

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