@extends('layouts.app')
@section('title', 'Bağış Yap - Atakder')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-donation/1920/600.jpg" alt="Bağış Yap" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Bağış Yap</h1>
            <p class="text-xl max-w-2xl mx-auto">Afetzedelere Umut Olun</p>
        </div>
    </section>
    
    <!-- İçerik Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-secondary">Bağışınızı Bekliyoruz</h2>
                
                <div class="prose prose-lg max-w-none mb-8">
                    <p class="mb-4">
                        Atakder olarak, afetzedelere yardım ulaştırmak için sizlerin desteğine ihtiyacımız var. 
                        Bağışlarınızla deprem, sel, çığ gibi afetlerden etkilenen ailelere umut olabilirsiniz.
                    </p>
                </div>
                
                <!-- Bağış Formu -->
                <div class="bg-gray-50 rounded-lg p-8 mb-8">
                    <h3 class="text-2xl font-bold mb-6 text-secondary">Online Bağış Formu</h3>
                    <form action="{{ route('donation.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Adınız Soyadınız</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">E-posta Adresiniz</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2">Telefon Numaranız</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            <div>
                                <label for="amount" class="block text-gray-700 font-medium mb-2">Bağış Tutarı (TL)</label>
                                <input type="number" id="amount" name="amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Örn: 100" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="donation_type" class="block text-gray-700 font-medium mb-2">Bağış Türü</label>
                            <select id="donation_type" name="donation_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="">Seçiniz</option>
                                <option value="tek_sefer">Tek Seferlik</option>
                                <option value="duzenli">Düzenli Bağış</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-gray-700 font-medium mb-2">Mesajınız (Opsiyonel)</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Bağışınızın kullanılmasını istediğiniz alanı belirtebilirsiniz..."></textarea>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" id="agreement" name="agreement" class="mr-2" required>
                            <label for="agreement" class="text-gray-700">
                                <a href="{{ route('kvkk') }}" class="text-primary">KVKK metnini</a> okudum ve kabul ediyorum.
                            </label>
                        </div>
                        
                        <button type="submit" class="btn-primary text-secondary px-6 py-3 rounded-lg font-medium w-full">
                            Bağış Yap
                        </button>
                    </form>
                </div>
                
                <!-- Banka Hesap Bilgileri -->
                <div class="bg-blue-50 rounded-lg p-8">
                    <h3 class="text-2xl font-bold mb-6 text-secondary">Banka Hesap Bilgileri</h3>
                    <p class="mb-4">
                        Online bağış dışında aşağıdaki hesaplarımıza da bağış yapabilirsiniz:
                    </p>
                    
                    <div class="space-y-4">
                        @forelse ($accountNumbers as $accountNumber)
                            <div class="bg-white rounded-lg p-4 border border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h4 class="font-medium">{{ $accountNumber->bank_name }}</h4>
                                        <p class="text-sm text-gray-500">Hesap Sahibi: {{ $accountNumber->account_holder }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-mono text-sm">{{ $accountNumber->iban }}</p>
                                        <p class="text-xs text-gray-500">IBAN</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center py-4">Henüz hesap numarası eklenmemiş.</p>
                        @endforelse
                    </div>
                    
                    <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                        <p class="text-sm text-yellow-800">
                            <strong>Önemli:</strong> Havale/EFT açıklama bölümüne "BAĞIŞ" yazmanızı rica ederiz.
                        </p>
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