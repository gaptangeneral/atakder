@extends('layouts.app')
@section('title', 'Acil Durum Müdahale - Atakder')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            @if($emergency && $emergency->image)
                <img src="{{ asset('storage/' . $emergency->image) }}" alt="{{ $emergency->title }}" class="w-full h-full object-cover">
            @else
                <img src="https://picsum.photos/seed/atakder-emergency/1920/600.jpg" alt="Acil Durum Müdahale" class="w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                @if($emergency)
                    {{ $emergency->title }}
                @else
                    Acil Durum Müdahale
                @endif
            </h1>
            <p class="text-xl max-w-2xl mx-auto">Hızlı ve Etkili Müdahale</p>
        </div>
    </section>
    
    <!-- İçerik Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-secondary">Acil Durum Müdahale Faaliyetlerimiz</h2>
                
                <div class="prose prose-lg max-w-none">
                    @if($emergency)
                        {!! $emergency->content !!}
                    @else
                        <p class="mb-6">
                            Atakder olarak, afet ve acil durum situationsında hızlı ve etkili müdahale etmek için 7/24 hazır bekliyoruz. 
                            Uzman ekiplerimizle, en kısa sürede afet bölgesine ulaşarak ihtiyaç sahiplerine yardım ulaştırıyoruz.
                        </p>
                        
                        <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Müdahale Sürecimiz</h3>
                        <p class="mb-4">
                            Acil durum müdahale faaliyetlerimiz aşağıdaki adımları içerir:
                        </p>
                        <ol class="list-decimal pl-6 space-y-2">
                            <li><strong>Alarm ve Değerlendirme:</strong> Afet haberini alınca, durum değerlendirmesi yapılır</li>
                            <li><strong>Hızlı Müdahale Ekibi:</strong> Uzman ekiplerimiz derhal harekete geçer</li>
                            <li><strong>Lojistik Planlama:</strong> Gerekli malzemeler ve ekipmanlar hazırlanır</li>
                            <li><strong>Bölgeye Ulaşım:</strong> En kısa sürede afet bölgesine ulaşılır</li>
                            <li><strong>Müdahale:</strong> Arama kurtarma ve yardım faaliyetleri başlatılır</li>
                            <li><strong>Koordinasyon:</strong> Diğer kurumlarla koordineli çalışma</li>
                            <li><strong>Raporlama:</strong> Faaliyetler raporlanır ve değerlendirilir</li>
                        </ol>
                        
                        <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Ekipmanlarımız</h3>
                        <p class="mb-4">
                            Acil durum müdahale faaliyetlerimizde kullandığımız bazı ekipmanlar:
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Arama kurtarma ekipmanları</li>
                            <li>İlk yardım malzemeleri</li>
                            <li>İletişim cihazları</li>
                            <li>Kurtarma araçları</li>
                            <li>Geçici barınma malzemeleri</li>
                            <li>Personel koruyucu ekipmanları</li>
                        </ul>
                        
                        <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Eğitimlerimiz</h3>
                        <p class="mb-4">
                            Acil durum müdahale ekibimiz düzenli olarak eğitim alır. Bu eğitimler:
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Arama kurtarma teknikleri</li>
                            <li>İlk yardım ve acil müdahale</li>
                            <li>Afet psikolojisi</li>
                            <li>Lojistik ve koordinasyon</li>
                            <li>Güvenlik protokolleri</li>
                        </ul>
                    @endif
                    
                    <div class="bg-blue-50 rounded-lg p-6 mt-8">
                        <h3 class="text-xl font-bold mb-4 text-secondary">Acil Durum İletişim</h3>
                        <p class="mb-4">
                            Acil durumlar için 7/24 ulaşabileceğiniz iletişim bilgileri:
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                @if($emergency && $emergency->phone)
                                    <p><strong>Acil Durum Hattı:</strong> {{ $emergency->phone }}</p>
                                @else
                                    <p><strong>Acil Durum Hattı:</strong> 444 0 123</p>
                                @endif
                                @if($emergency && $emergency->phone)
                                    <p><strong>Mobil:</strong> {{ $emergency->phone }}</p>
                                @else
                                    <p><strong>Mobil:</strong> +90 (532) 123 45 67</p>
                                @endif
                            </div>
                            <div>
                                @if($emergency && $emergency->email)
                                    <p><strong>E-posta:</strong> {{ $emergency->email }}</p>
                                @else
                                    <p><strong>E-posta:</strong> acil@atakder.org.tr</p>
                                @endif
                                @if($emergency && $emergency->address)
                                    <p><strong>Adres:</strong> {{ $emergency->address }}</p>
                                @else
                                    <p><strong>Adres:</strong> Merkez, İstanbul</p>
                                @endif
                            </div>
                        </div>
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