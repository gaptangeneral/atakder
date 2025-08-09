@extends('admin.layout')
@section('title', 'Galeri Yönetimi')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Galeri Yönetimi</h2>
    <a href="{{ route('admin.gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
        <i class="fas fa-plus mr-2"></i> Yeni Resim Ekle
    </a>
</div>

@if($galleries->count() > 0)
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Resim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Başlık</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Anasayfa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sıra</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İşlemler</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="gallery-table-body">
                @foreach($galleries as $gallery)
                <tr data-id="{{ $gallery->id }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($gallery->image_path && Storage::disk('public')->exists($gallery->image_path))
                            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="h-16 w-16 object-cover rounded">
                        @else
                            <div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $gallery->title }}</div>
                        <div class="text-sm text-gray-500">{{ $gallery->image_path }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($gallery->show_on_homepage)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Evet
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Hayır
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="number" value="{{ $gallery->order }}" class="order-input w-16 px-2 py-1 border border-gray-300 rounded text-sm" data-id="{{ $gallery->id }}">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.gallery.edit', $gallery) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Düzenle</a>
                        <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Bu resmi silmek istediğinizden emin misiniz?')">Sil</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <button id="update-order-btn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
        <i class="fas fa-sort mr-2"></i> Sıralamayı Güncelle
    </button>
</div>
@else
<div class="bg-white rounded-lg shadow p-6 text-center">
    <i class="fas fa-image text-6xl text-gray-300 mb-4"></i>
    <h3 class="text-lg font-medium text-gray-700 mb-2">Henüz galeri resmi yok</h3>
    <p class="text-gray-500 mb-4">İlk galeri resminizi ekleyerek başlayın.</p>
    <a href="{{ route('admin.gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
        <i class="fas fa-plus mr-2"></i> İlk Resmi Ekle
    </a>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const updateOrderBtn = document.getElementById('update-order-btn');
    
    if (updateOrderBtn) {
        updateOrderBtn.addEventListener('click', function() {
            const orders = [];
            const orderInputs = document.querySelectorAll('.order-input');
            
            orderInputs.forEach(input => {
                orders.push({
                    id: input.dataset.id,
                    order: parseInt(input.value)
                });
            });
            
            fetch('{{ route('admin.gallery.updateOrder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    orders: orders
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Bir hata oluştu: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Bir hata oluştu.');
            });
        });
    }
});
</script>
@endsection