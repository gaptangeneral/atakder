@extends('layouts.app')

@section('title', 'KVKK - Atakder')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-kvkk/1920/600.jpg" alt="KVKK" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">KVKK</h1>
            <p class="text-xl max-w-2xl mx-auto">Kişisel Verilerin Korunması Kanunu</p>
        </div>
    </section>
    
    <!-- İçerik Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-secondary">Kişisel Verilerin Korunması Politikası</h2>
                
                <div class="prose prose-lg max-w-none">
                    <p class="mb-4">
                        Atakder Acil Yardım ve Arama Kurtarma Derneği olarak, kişisel verilerinizin güvenliğine önem veriyor ve 
                        6698 sayılı Kişisel Verilerin Korunması Kanunu'na ("KVKK") uygun hareket ediyoruz.
                    </p>
                    
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Veri Sorumlusu</h3>
                    <p class="mb-4">
                        6698 sayılı Kanun uyarınca, veri sorumlusu; kişisel verilerin işleme amaçlarını ve vasıtalarını belirleyen, 
                        veri kayıt sisteminin kurulmasından ve yönetilmesinden sorumlu olan gerçek veya tüzel kişidir. 
                        Bu kapsamda, Atakder Derneği veri sorumlusudur.
                    </p>
                    
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">İşlenen Kişisel Veriler</h3>
                    <p class="mb-4">
                        Derneğimiz tarafından aşağıdaki kişisel veriler işlenmektedir:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Kimlik bilgileri (ad, soyadı, T.C. kimlik no.)</li>
                        <li>İletişim bilgileri (adres, telefon, e-posta)</li>
                        <li>Banka hesap bilgileri</li>
                        <li>Gönüllü formlarında belirtilen bilgiler</li>
                        <li>Bağış bilgileri</li>
                    </ul>
                    
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Veri İşleme Amaçları</h3>
                    <p class="mb-4">
                        Kişisel verileriniz aşağıdaki amaçlarla işlenmektedir:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Dernek faaliyetlerinin yürütülmesi</li>
                        <li>Gönüllü ve bağışçılarla iletişim</li>
                        <li>Yasal yükümlülüklerin yerine getirilmesi</li>
                        <li>Bilgilendirme ve duyuru yapılması</li>
                    </ul>
                    
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Haklarınız</h3>
                    <p class="mb-4">
                        KVKK kapsamında aşağıdaki haklara sahipsiniz:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Kişisel verilerinizin işlenip işlenmediğini öğrenme</li>
                        <li>Kişisel verilerinize ilişkin bilgi talep etme</li>
                        <li>Kişisel verilerinizin düzeltilmesini isteme</li>
                        <li>Kişisel verilerinizin silinmesini isteme</li>
                        <li>Kişisel verilerinizin kanuna aykırı olarak işlenmesini önleme</li>
                    </ul>
                    
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">İletişim</h3>
                    <p class="mb-4">
                        KVKK kapsamında haklarınızı kullanmak veya kişisel verilerinizle ilgili sorularınız için 
                        bizimle iletişime geçebilirsiniz:
                    </p>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p><strong>E-posta:</strong> kvkk@atakder.org.tr</p>
                        <p><strong>Adres:</strong> Örnek Mahalle, Örnek Sokak No:1, İstanbul</p>
                        <p><strong>Telefon:</strong> +90 (212) 123 45 67</p>
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