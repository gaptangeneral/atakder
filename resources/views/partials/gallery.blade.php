<!-- Galeri Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-secondary">Galeri</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Galeri Öğeleri -->
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder1/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder1/400/300.jpg" alt="Galeri 1" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder2/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder2/400/300.jpg" alt="Galeri 2" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder3/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder3/400/300.jpg" alt="Galeri 3" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder4/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder4/400/300.jpg" alt="Galeri 4" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder5/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder5/400/300.jpg" alt="Galeri 5" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder6/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder6/400/300.jpg" alt="Galeri 6" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder7/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder7/400/300.jpg" alt="Galeri 7" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder8/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder8/400/300.jpg" alt="Galeri 8" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder9/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder9/400/300.jpg" alt="Galeri 9" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder10/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder10/400/300.jpg" alt="Galeri 10" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder11/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder11/400/300.jpg" alt="Galeri 11" class="w-full h-64 object-cover">
            </div>
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('https://picsum.photos/seed/atakder12/800/600.jpg')">
                <img src="https://picsum.photos/seed/atakder12/400/300.jpg" alt="Galeri 12" class="w-full h-64 object-cover">
            </div>
        </div>
        
        <div class="text-center mt-10">
    <a href="{{ route('gallery') }}" class="btn-primary text-secondary px-6 py-3 rounded-lg font-medium inline-flex items-center">
        <i class="fas fa-images mr-2"></i> Tüm Galeriyi Görüntüle
    </a>
</div>
    </div>
</section>

<!-- Lightbox -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="lightbox-close">&times;</span>
    <img id="lightbox-img" src="" alt="">
</div>