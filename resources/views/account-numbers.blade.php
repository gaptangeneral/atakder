@extends('layouts.app')
@section('title', 'Hesap Numaraları - Atakder')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-account/1920/600.jpg" alt="Hesap Numaraları" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Hesap Numaraları</h1>
            <p class="text-xl max-w-2xl mx-auto">Bağış Hesaplarımız</p>
        </div>
    </section>
    
    <!-- İçerik Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-secondary">Bağış Hesaplarımız</h2>
                <p class="text-gray-600 mb-8">
                    Derneğimizin çalışmalarına destek olmak için aşağıdaki hesap numaralarına bağış yapabilirsiniz. 
                    Bağışlarınız afetzedelere ulaşmamızı sağlayacaktır.
                </p>
                
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <h3 class="text-xl font-bold mb-4 text-secondary">Banka Hesap Bilgileri</h3>
                    <div class="space-y-4">
                        @forelse ($accountNumbers as $accountNumber)
                            <div class="flex justify-between items-center border-b pb-3">
                                <div>
                                    <h4 class="font-medium">{{ $accountNumber->bank_name }}</h4>
                                    <p class="text-gray-600">Hesap Sahibi: {{ $accountNumber->account_holder }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-mono text-lg">{{ $accountNumber->iban }}</p>
                                    <p class="text-sm text-gray-500">IBAN</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center py-4">Henüz hesap numarası eklenmemiş.</p>
                        @endforelse
                    </div>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4 text-secondary">Bağış Yaparken Dikkat Edilmesi Gerekenler</h3>
                    <ul class="list-disc pl-6 space-y-2 text-gray-600">
                        <li>Açıklama bölümüne "Bağış" yazmanızı rica ederiz</li>
                        <li>Bağışınızın kullanım amacını belirtirseniz (örn: depremzedeler için yardım)</li>
                        <li>Dekont bilgilerinizi info@atakder.org.tr adresine gönderirseniz seviniriz</li>
                        <li>Bağış makbuzu için dernek merkezimizi arayabilirsiniz</li>
                    </ul>
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