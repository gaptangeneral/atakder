@extends('admin.layout')
@section('title', 'Acil Durum Müdahale')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Acil Durum Müdahale</h2>
    <a href="{{ route('admin.emergency.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
        <i class="fas fa-plus mr-2"></i> Yeni Ekle
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

@if($emergency)
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Başlık</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İletişim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durum</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İşlemler</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $emergency->title }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            @if($emergency->phone)
                                <p><strong>Telefon:</strong> {{ $emergency->phone }}</p>
                            @endif
                            @if($emergency->email)
                                <p><strong>E-posta:</strong> {{ $emergency->email }}</p>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($emergency->is_active)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Aktif
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Pasif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.emergency.edit', $emergency->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Düzenle</a>
                        <form action="{{ route('admin.emergency.destroy', $emergency->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Bu acil durum bilgisini silmek istediğinizden emin misiniz?')">Sil</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@else
<div class="bg-white rounded-lg shadow p-6 text-center">
    <i class="fas fa-exclamation-triangle text-6xl text-gray-300 mb-4"></i>
    <h3 class="text-lg font-medium text-gray-700 mb-2">Henüz acil durum bilgisi yok</h3>
    <p class="text-gray-500 mb-4">İlk acil durum bilginizi ekleyerek başlayın.</p>
    <a href="{{ route('admin.emergency.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
        <i class="fas fa-plus mr-2"></i> İlk Acil Durum Bilgisini Ekle
    </a>
</div>
@endif
@endsection