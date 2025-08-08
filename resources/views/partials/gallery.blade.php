<!-- Galeri Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-secondary">Galeri</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
                // Sadece anasayfada gösterilecek ve aktif olan galerileri al
                $homepageGalleries = \App\Models\Gallery::where('show_on_homepage', true)
                    ->where('is_active', true)
                    ->orderBy('order', 'asc')
                    ->take(12)
                    ->get();
            @endphp
            
            @foreach($homepageGalleries as $gallery)
            <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="openLightbox('{{ asset('storage/' . str_replace('/400/300', '/800/600', $gallery->image_path)) }}')">
                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover">
            </div>
            @endforeach
            
            @if($homepageGalleries->count() === 0)
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Henüz galeri resmi eklenmemiş.</p>
                </div>
            @endif
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
    <span class="lightbox-close" onclick="closeLightbox(event)">&times;</span>
    <img id="lightbox-img" src="" alt="" onclick="event.stopPropagation()">
</div>