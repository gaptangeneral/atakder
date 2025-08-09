@extends('admin.layout')
@section('title', 'Hakkımızda')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-4xl mx-auto">
    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Hakkımızda İçeriği</label>
            
            <!-- Sekmeler -->
            <div class="border-b border-gray-200 mb-4">
                <nav class="-mb-px flex space-x-8">
                    <button type="button" id="text-tab" class="tab-button py-2 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600 focus:outline-none">
                        Metin Düzenleyici
                    </button>
                    <button type="button" id="html-tab" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">
                        HTML Düzenleyici
                    </button>
                </nav>
            </div>
            
            <!-- Sekme İçerikleri -->
            <div class="tab-content">
                <!-- Metin Sekmesi -->
                <div id="text-panel" class="tab-panel">
                    <textarea id="text-content" name="text_content" rows="10" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $about->content ?? '') }}</textarea>
                </div>
                
                <!-- HTML Sekmesi -->
                <div id="html-panel" class="tab-panel hidden">
                    <textarea id="html-content" name="html_content" rows="10" class="w-full px-3 py-2 border border-gray-300 rounded-md font-mono focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $about->content ?? '') }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">HTML etiketlerini doğrudan düzenleyebilirsiniz.</p>
                </div>
            </div>
            
            <!-- Gizli içerik alanı -->
            <input type="hidden" id="content" name="content" value="{{ old('content', $about->content ?? '') }}">
            
            @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Hakkımızda Görseli</label>
            <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if(isset($about->image) && $about->image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $about->image) }}" alt="Hakkımızda Görseli" class="max-w-xs rounded shadow">
                </div>
            @endif
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="text-right">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-semibold">
                Güncelle
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sekme değiştirme işlevselliği
    const textTab = document.getElementById('text-tab');
    const htmlTab = document.getElementById('html-tab');
    const textPanel = document.getElementById('text-panel');
    const htmlPanel = document.getElementById('html-panel');
    const contentField = document.getElementById('content');
    const textContent = document.getElementById('text-content');
    const htmlContent = document.getElementById('html-content');
    
    // Metin sekmesine tıklandığında
    textTab.addEventListener('click', function() {
        // Aktif sekme stilini güncelle
        textTab.classList.add('border-blue-500', 'text-blue-600');
        textTab.classList.remove('border-transparent', 'text-gray-500');
        htmlTab.classList.remove('border-blue-500', 'text-blue-600');
        htmlTab.classList.add('border-transparent', 'text-gray-500');
        
        // Paneli göster/gizle
        textPanel.classList.remove('hidden');
        htmlPanel.classList.add('hidden');
        
        // İçeriği senkronize et
        textContent.value = contentField.value;
    });
    
    // HTML sekmesine tıklandığında
    htmlTab.addEventListener('click', function() {
        // Aktif sekme stilini güncelle
        htmlTab.classList.add('border-blue-500', 'text-blue-600');
        htmlTab.classList.remove('border-transparent', 'text-gray-500');
        textTab.classList.remove('border-blue-500', 'text-blue-600');
        textTab.classList.add('border-transparent', 'text-gray-500');
        
        // Paneli göster/gizle
        htmlPanel.classList.remove('hidden');
        textPanel.classList.add('hidden');
        
        // İçeriği senkronize et
        htmlContent.value = contentField.value;
    });
    
    // Metin içeriği değiştiğinde
    textContent.addEventListener('input', function() {
        contentField.value = textContent.value;
    });
    
    // HTML içeriği değiştiğinde
    htmlContent.addEventListener('input', function() {
        contentField.value = htmlContent.value;
    });
    
    // Form gönderilmeden önce içeriği güncelle
    document.querySelector('form').addEventListener('submit', function() {
        if (!textPanel.classList.contains('hidden')) {
            contentField.value = textContent.value;
        } else {
            contentField.value = htmlContent.value;
        }
    });
});
</script>
@endsection