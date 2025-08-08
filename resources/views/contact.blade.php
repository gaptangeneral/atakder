@extends('layouts.app')

@section('title', 'İletişim - ' . config('app.name'))

@section('content')
<!-- Hero Section -->
@include('partials.hero')

<!-- İletişim Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-secondary">İletişim</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- İletişim Bilgileri -->
                <div>
                    <h3 class="text-xl font-semibold mb-6 text-secondary">İletişim Bilgileri</h3>
                    
                    @php
                        $contactEmail = \App\Models\SiteSetting::get('contact_email');
                        $contactPhone = \App\Models\SiteSetting::get('contact_phone');
                        $contactAddress = \App\Models\SiteSetting::get('contact_address');
                    @endphp
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-primary text-white mr-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-secondary">Adres</h4>
                                <p class="text-gray-600">{{ $contactAddress ?: 'Örnek Mahalle, Örnek Sokak No:1, İstanbul' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-primary text-white mr-4">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-secondary">Telefon</h4>
                                <p class="text-gray-600">{{ $contactPhone ?: '+90 (212) 123 45 67' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-primary text-white mr-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-secondary">E-posta</h4>
                                <p class="text-gray-600">{{ $contactEmail ?: 'info@atakder.org.tr' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sosyal Medya -->
                    <div class="mt-8">
                        <h4 class="font-medium text-secondary mb-4">Bizi Takip Edin</h4>
                        @php
                            $socialFacebook = \App\Models\SiteSetting::get('social_facebook');
                            $socialTwitter = \App\Models\SiteSetting::get('social_twitter');
                            $socialInstagram = \App\Models\SiteSetting::get('social_instagram');
                            $socialYoutube = \App\Models\SiteSetting::get('social_youtube');
                        @endphp
                        
                        <div class="flex space-x-4">
                            @if($socialFacebook)
                                <a href="{{ $socialFacebook }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white hover:bg-secondary transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if($socialTwitter)
                                <a href="{{ $socialTwitter }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white hover:bg-secondary transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($socialInstagram)
                                <a href="{{ $socialInstagram }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white hover:bg-secondary transition">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if($socialYoutube)
                                <a href="{{ $socialYoutube }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white hover:bg-secondary transition">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- İletişim Formu -->
                <div>
                    <h3 class="text-xl font-semibold mb-6 text-secondary">Mesaj Gönderin</h3>
                    
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Adınız</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">E-posta</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Konu</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Mesajınız</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-primary text-gray-800 px-6 py-3 rounded-lg font-medium hover:bg-secondary transition">
                            Mesaj Gönder
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Harita Section -->
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-xl font-semibold mb-6 text-secondary text-center">Harita</h3>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.123456789!2d29.123456789!3d40.123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDA2JzEwLjAiTiA0MMKwMTQzNzUuMiJF!5e0!3m2!1str!2str!4v123456789!5m2!1str!2str!4v123456789!5m2!1str!2str!4v123456789" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection