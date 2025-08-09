@extends('layouts.app')
@section('title', 'Arama ve Kurtarma - Atakder')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            @if($searchRescue && $searchRescue->image)
                <img src="{{ asset('storage/' . $searchRescue->image) }}" alt="{{ $searchRescue->title }}" class="w-full h-full object-cover">
            @else
                <img src="https://picsum.photos/seed/atakder-rescue/1920/600.jpg" alt="Arama ve Kurtarma" class="w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                @if($searchRescue)
                    {{ $searchRescue->title }}
                @else
                    Arama ve Kurtarma
                @endif
            </h1>
            <p class="text-xl max-w-2xl mx-auto">Uzman Ekiplerimizle Hizmetinizdeyiz</p>
        </div>
    </section>
    
    <!-- İçerik Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-secondary">Arama ve Kurtarma Faaliyetlerimiz</h2>
                
                <div class="prose prose-lg max-w-none">
                    @if($searchRescue)
                        {!! $searchRescue->content !!}
                    @else
                        <p class="mb-6">
                            Atakder olarak, arama ve kurtarma operasyonlarında uzman ekiplerimizle hizmet veriyoruz. 
                            Deprem, sel, çığ gibi afetlerde kaybolan kişileri bulmak ve kurtarmak için 7/24 hazırız.
                        </p>
                        
                        <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Uzmanlık Alanlarımız</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h4 class="text-xl font-bold mb-2 text-secondary">Bina Arama Kurtarma</h4>
                                <p class="text-gray-600">Deprem sonrası enkaz altında kalan kişileri kurtarma operasyonları</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h4 class="text-xl font-bold mb-2 text-secondary">Kentsel Arama Kurtarma</h4>
                                <p class="text-gray-600">Şartlı alanda kaybolan kişileri bulma ve kurtarma operasyonları</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h4 class="text-xl font-bold mb-2 text-secondary">Su Altı Arama Kurtarma</h4>
                                <p class="text-gray-600">Sel ve su baskınlarında su altında kalanları kurtarma operasyonları</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h4 class="text-xl font-bold mb-2 text-secondary">Dağ Arama Kurtarma</h4>
                                <p class="text-gray-600">Dağlık arazide kaybolanları bulma ve kurtarma operasyonları</p>
                            </div>
                        </div>
                        
                        <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Ekipmanlarımız</h3>
                        <p class="mb-4">
                            Arama ve kurtarma operasyonlarında kullandığımız modern ekipmanlar:
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Termal kameralar (canlı tespit için)</li>
                            <li>Dinleme cihazları (ses sinyali tespiti için)</li>
                            <li>Beton kesme ve delme ekipmanları</li>
                            <li>Kaldırma ve taşıma ekipmanları</li>
                            <li>İletişim ve koordinasyon sistemleri</li>
                            <li>Kurtarma köpekleri</li>
                        </ul>
                        
                        <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Eğitimlerimiz</h3>
                        <p class="mb-4">
                            Arama kurtarma ekibimiz düzenli olarak uluslararası standartlarda eğitim alır:
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>INSARAG (Uluslararası Arama Kurtarma Danışma Grubu) standartları</li>
                            <li>TUSAR (Türkiye Ulusal Arama Kurtarma) eğitimleri</li>
                            <li>İlk yardım ve acil müdahale eğitimleri</li>
                            <li>Rope access (iplere erişim) eğitimleri</li>
                            <li>Kurtarma köpeği eğitimi</li>
                        </ul>
                    @endif
                    
                    <div class="bg-blue-50 rounded-lg p-6 mt-8">
                        <h3 class="text-xl font-bold mb-4 text-secondary">Başvuru ve Gönüllülük</h3>
                        <p class="mb-4">
                            Arama kurtarma ekibimize katılmak için aşağıdaki şartları taşımanız gerekmek:
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>18 yaşını doldurmuş olmak</li>
                            <li>Fiziksel olarak uygun olmak</li>
                            <li>Ekip çalışmasına yatkın olmak</li>
                            <li>Zorlu koşullarda çalışabilecek olmak</li>
                        </ul>
                        <p class="mt-4">
                            Gönüllü olmak için <a href="#" class="text-primary">gönüllü formunu</a> doldurabilirsiniz.
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