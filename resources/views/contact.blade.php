@extends('layouts.app')

@section('title', 'İletişim - Atakder')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-contact/1920/600.jpg" alt="İletişim" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">İletişim</h1>
            <p class="text-xl max-w-2xl mx-auto">Bize Ulaşın</p>
        </div>
    </section>
    
    <!-- İletişim Formu -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- İletişim Bilgileri -->
                    <div>
                        <h2 class="text-3xl font-bold mb-8 text-secondary">İletişim Bilgileri</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-4 text-primary text-xl"></i>
                                <div>
                                    <h3 class="font-bold text-lg">Adres</h3>
                                    <p class="text-gray-600">Örnek Mahalle, Örnek Sokak No:1, İstanbul</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone mr-4 text-primary text-xl"></i>
                                <div>
                                    <h3 class="font-bold text-lg">Telefon</h3>
                                    <p class="text-gray-600">+90 (212) 123 45 67</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope mr-4 text-primary text-xl"></i>
                                <div>
                                    <h3 class="font-bold text-lg">E-posta</h3>
                                    <p class="text-gray-600">info@atakder.org.tr</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- İletişim Formu -->
                    <div>
                        <h2 class="text-3xl font-bold mb-8 text-secondary">Mesaj Gönderin</h2>
                        <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Adınız Soyadınız</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">E-posta Adresiniz</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            <div>
                                <label for="subject" class="block text-gray-700 font-medium mb-2">Konu</label>
                                <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-2">Mesajınız</label>
                                <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required></textarea>
                            </div>
                            <button type="submit" class="btn-primary text-secondary px-6 py-3 rounded-lg font-medium w-full">
                                Gönder
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection