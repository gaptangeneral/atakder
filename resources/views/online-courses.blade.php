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
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-secondary">Online Eğitimlerimiz</h2>
                
                <div class="prose prose-lg max-w-none">
                    <p class="mb-6">
                        Atakder olarak, afetlere karşı toplumu bilinçlendirmek ve hazırlamak amacıyla ücretsiz online eğitim programları düzenliyoruz. 
                        Bu eğitimlerle, afet anında ne yapılması gerektiğini öğrenerek kendinizi ve sevdiklerinizi koruyabilirsiniz.
                    </p>
                    
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Eğitim Programlarımız</h3>
                    <div class="space-y-6">
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h4 class="text-xl font-bold mb-2 text-secondary">Temel Afet Bilinci</h4>
                            <p class="text-gray-600 mb-3">
                                Deprem, sel, çığ gibi afet türleri hakkında temel bilgiler ve alınması gereken önlemler.
                            </p>
                            <ul class="list-disc pl-6 text-gray-600">
                                <li>Afet türleri ve özellikleri</li>
                                <li>Afet öncesi hazırlık</li>
                                <li>Afet sırasında yapılması gerekenler</li>
                                <li>Afet sonrası rehabilitasyon</li>
                            </ul>
                            <div class="mt-4">
                                <span class="inline-block bg-primary text-gray-800 px-3 py-1 rounded-full text-sm font-medium">4 Hafta</span>
                                <span class="inline-block bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium ml-2">Ücretsiz</span>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h4 class="text-xl font-bold mb-2 text-secondary">İlk Yardım ve Acil Müdahale</h4>
                            <p class="text-gray-600 mb-3">
                                Acil durumda ilk yardım müdahalesi nasıl yapılır, temel yaşam destek teknikleri.
                            </p>
                            <ul class="list-disc pl-6 text-gray-600">
                                <li>ABC ilkyardım prensipleri</li>
                                <li>Kanamayı durdurma teknikleri</li>
                                <li>Yaralanma ve kırıklarda müdahale</li>
                                <li>Yangın ve zehirlenmelerde ilk yardım</li>
                            </ul>
                            <div class="mt-4">
                                <span class="inline-block bg-primary text-gray-800 px-3 py-1 rounded-full text-sm font-medium">6 Hafta</span>
                                <span class="inline-block bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium ml-2">Ücretsiz</span>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h4 class="text-xl font-bold mb-2 text-secondary">Aile Afet Planı</h4>
                            <p class="text-gray-600 mb-3">
                                Aileniz için afet hazırlık planı oluşturma ve uygulama teknikleri.
                            </p>
                            <ul class="list-disc pl-6 text-gray-600">
                                <li>Aile iletişim planı</li>
                                <li>Acil çanta hazırlama</li>
                                <li>Tahliye planı</li>
                                <li>Toplanma noktaları</li>
                            </ul>
                            <div class="mt-4">
                                <span class="inline-block bg-primary text-gray-800 px-3 py-1 rounded-full text-sm font-medium">3 Hafta</span>
                                <span class="inline-block bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium ml-2">Ücretsiz</span>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h4 class="text-xl font-bold mb-2 text-secondary">Psikolojik İlk Yardım</h4>
                            <p class="text-gray-600 mb-3">
                                Afet sonrası travma yaşayanlara psikolojik destek sağlama teknikleri.
                            </p>
                            <ul class="list-disc pl-6 text-gray-600">
                                <li>Afet psikolojisi temelleri</li>
                                <li>Travma belirtileri</li>
                                <li>Dinleme ve destek teknikleri</li>
                                <li>Profesyonel yardım arama</li>
                            </ul>
                            <div class="mt-4">
                                <span class="inline-block bg-primary text-gray-800 px-3 py-1 rounded-full text-sm font-medium">5 Hafta</span>
                                <span class="inline-block bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium ml-2">Ücretsiz</span>
                            </div>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Eğitim Süreci</h3>
                    <p class="mb-4">
                        Online eğitimlerimize katılmak çok kolay:
                    </p>
                    <ol class="list-decimal pl-6 space-y-2">
                        <li><strong>Kayıt:</strong> Web sitemiz üzerinden kayıt formunu doldurun</li>
                        <li><strong>Erişim:</strong> Kayıt olduğunuzda eğitim platformuna erişim bilgileri gönderilir</li>
                        <li><strong>Eğitim:</strong> Videoları izleyin, materyalleri indirin</li>
                        <li><strong>Sınav:</strong> Eğitim sonunda online sınav yapılır</li>
                        <li><strong>Sertifika:</strong> Başarılı olanlara katılım sertifikası verilir</li>
                    </ol>
                    
                    <div class="bg-blue-50 rounded-lg p-6 mt-8">
                        <h3 class="text-xl font-bold mb-4 text-secondary">Kayıt Olun</h3>
                        <p class="mb-4">
                            Online eğitim programlarımıza katılmak için hemen kayıt olun. Kontenjanımız sınırlıdır!
                        </p>
                        <a href="#" class="btn-primary text-secondary px-6 py-3 rounded-lg font-medium inline-block">
                            Kayıt Ol
                        </a>
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