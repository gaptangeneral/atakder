<!-- Projelerimiz Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-secondary">Projelerimiz</h2>
        
        <div class="slider relative max-w-4xl mx-auto">
            <div class="slider-container" id="projectSlider">
                <!-- Proje 1 -->
                <div class="slider-item bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/proje1/800/400.jpg" alt="Proje 1" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-secondary">Acil Yardım Tırları</h3>
                        <p class="text-gray-600">Afet bölgelerine hızlı müdahale için özel olarak tasarlanmış yardım tırlarıyla ihtiyaç sahiplerine ulaşıyoruz.</p>
                        <div class="mt-4">
                            <a href="#" class="text-primary font-medium inline-flex items-center">
                                Detaylı Bilgi <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Proje 2 -->
                <div class="slider-item bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/proje2/800/400.jpg" alt="Proje 2" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-secondary">Arama Kurtarma Eğitimleri</h3>
                        <p class="text-gray-600">Profesyonel ekiplerimizle afet anında doğru müdahale için arama kurtarma eğitimleri düzenliyoruz.</p>
                        <div class="mt-4">
                            <a href="#" class="text-primary font-medium inline-flex items-center">
                                Detaylı Bilgi <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Proje 3 -->
                <div class="slider-item bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/proje3/800/400.jpg" alt="Proje 3" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-secondary">Geçici Barınma Merkezleri</h3>
                        <p class="text-gray-600">Afetzedeler için güvenli ve hijyenik geçici barınma merkezleri kurarak temel ihtiyaçlarını karşılıyoruz.</p>
                        <div class="mt-4">
                            <a href="#" class="text-primary font-medium inline-flex items-center">
                                Detaylı Bilgi <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slider Kontrolleri -->
            <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md" onclick="prevSlide()">
                <i class="fas fa-chevron-left text-secondary"></i>
            </button>
            <button class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md" onclick="nextSlide()">
                <i class="fas fa-chevron-right text-secondary"></i>
            </button>
            
            <!-- Slider Indicators -->
            <div class="flex justify-center mt-4 space-x-2">
                <button class="w-3 h-3 rounded-full bg-primary" onclick="currentSlide(1)"></button>
                <button class="w-3 h-3 rounded-full bg-gray-300" onclick="currentSlide(2)"></button>
                <button class="w-3 h-3 rounded-full bg-gray-300" onclick="currentSlide(3)"></button>
            </div>
        </div>
    </div>
</section>