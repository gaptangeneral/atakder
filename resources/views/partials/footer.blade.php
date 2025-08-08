<!-- Footer -->
<footer class="bg-secondary text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo ve Hakkında -->
            <div>
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full gradient-primary">
                        <span class="text-white font-bold text-xl">A</span>
                    </div>
                    <span class="ml-3 text-2xl font-bold">Atakder</span>
                </div>
                <p class="text-gray-300">Acil Yardım ve Arama Kurtarma Derneği olarak afetzedelere umut olmaya devam ediyoruz.</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <!-- Hızlı Linkler -->
            <div>
                <h3 class="text-lg font-bold mb-4">Hızlı Linkler</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-primary transition">Anasayfa</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-primary transition">Hakkımızda</a></li>
                    <li><a href="{{ route('projects') }}" class="text-gray-300 hover:text-primary transition">Projelerimiz</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-gray-300 hover:text-primary transition">Galeri</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-primary transition">İletişim</a></li>
                    <li><a href="{{ route('donation') }}" class="text-gray-300 hover:text-primary transition">Bağış Yap</a></li>
                </ul>
            </div>
            
            <!-- İletişim Bilgileri -->
            <div>
                <h3 class="text-lg font-bold mb-4">İletişim Bilgileri</h3>
                <ul class="space-y-2 text-gray-300">
                    <li class="flex items-start"><i class="fas fa-map-marker-alt mt-1 mr-2 text-primary"></i> Örnek Mahalle, Örnek Sokak No:1, İstanbul</li>
                    <li class="flex items-center"><i class="fas fa-phone mr-2 text-primary"></i> +90 (212) 123 45 67</li>
                    <li class="flex items-center"><i class="fas fa-envelope mr-2 text-primary"></i> info@atakder.org.tr</li>
                </ul>
            </div>
            
            <!-- Bülten -->
            <div>
                <h3 class="text-lg font-bold mb-4">Bültenimize Abone Olun</h3>
                <p class="text-gray-300 mb-4">Haberler ve etkinliklerden haberdar olmak için e-posta adresinizi bırakın.</p>
                <form class="flex">
                    <input type="email" placeholder="E-posta adresiniz" class="px-4 py-2 w-full rounded-l-lg focus:outline-none text-gray-800">
                    <button type="submit" class="bg-primary text-gray-800 px-4 py-2 rounded-r-lg font-medium">Gönder</button>
                </form>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Atakder - Acil Yardım ve Arama Kurtarma Derneği. Tüm hakları saklıdır.</p>
        </div>
    </div>
</footer>