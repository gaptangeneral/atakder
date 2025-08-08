@extends('layouts.app')

@section('title', 'Sıkça Sorulan Sorular - Atakder')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-faq/1920/600.jpg" alt="SSS" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Sıkça Sorulan Sorular</h1>
            <p class="text-xl max-w-2xl mx-auto">Merak Ettikleriniz</p>
        </div>
    </section>
    
    <!-- SSS Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-3xl">
            <div class="space-y-4">
                <!-- Soru 1 -->
                <div class="faq-item border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-left p-4 bg-gray-50 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span class="font-medium text-secondary">Derneğinize nasıl bağış yapabilirim?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="faq-content bg-white p-4 text-gray-600">
                        <p>Derneğimize bağış yapmak için web sitemizdeki "Bağış Yap" butonunu kullanabilir veya banka hesap numaralarımıza EFT/Havale yapabilirsiniz. Ayrıca dernek merkezimize gelerek nakit bağışta da bulunabilirsiniz.</p>
                    </div>
                </div>
                
                <!-- Soru 2 -->
                <div class="faq-item border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-left p-4 bg-gray-50 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span class="font-medium text-secondary">Derneğinize nasıl üye olabilirim?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="faq-content bg-white p-4 text-gray-600">
                        <p>Derneğimize üye olmak için web sitemizdeki "Üye Ol" butonunu kullanarak online başvuru yapabilir veya dernek merkezimize gelerek yüz yüze başvuruda bulunabilirsiniz. Üyelik için gereken belgeler ve detaylı bilgi için iletişim sayfamızı ziyaret edebilirsiniz.</p>
                    </div>
                </div>
                
                <!-- Soru 3 -->
                <div class="faq-item border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-left p-4 bg-gray-50 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span class="font-medium text-secondary">Gönüllü olarak nasıl katkıda bulunabilirim?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="faq-content bg-white p-4 text-gray-600">
                        <p>Gönüllü olarak derneğimize katkıda bulunmak için web sitemizdeki gönüllü formunu doldurabilirsiniz. Eğitimlerimize katılarak afet anında müdahale ekibimize dahil olabilir veya organizasyonlarımızda görev alabilirsiniz.</p>
                    </div>
                </div>
                
                <!-- Soru 4 -->
                <div class="faq-item border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-left p-4 bg-gray-50 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span class="font-medium text-secondary">Derneğinizin faaliyet alanları nelerdir?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="faq-content bg-white p-4 text-gray-600">
                        <p>Derneğimiz; acil durum müdahale, arama ve kurtarma operasyonları, afet eğitimleri, geçici barınma merkezleri kurma, gıda ve temel ihtiyaç yardımı gibi birçok alanda faaliyet göstermektedir. Detaylı bilgi için "Faaliyetlerimiz" bölümümüzü inceleyebilirsiniz.</p>
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