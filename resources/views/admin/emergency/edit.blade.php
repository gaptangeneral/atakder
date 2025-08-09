@extends('admin.layout')
@section('title', 'Acil Durum Bilgisini Düzenle')

@section('content')
<h1 class="text-3xl font-bold mb-6">Acil Durum Bilgisini Düzenle</h1>

@if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.emergency.update', $emergency->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow max-w-2xl">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="title" class="block font-semibold mb-1">Başlık *</label>
        <input type="text" name="title" id="title" value="{{ old('title', $emergency->title) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
    </div>
    <div class="mb-4">
        <label for="content" class="block font-semibold mb-1">İçerik *</label>
        <textarea name="content" id="content" rows="10" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror">{{ old('content', $emergency->content) }}</textarea>
    </div>
    <div class="mb-4">
        <label for="image" class="block font-semibold mb-1">Görsel</label>
        <input type="file" name="image" id="image" accept="image/*"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
        <p class="text-sm text-gray-500 mt-1">JPG, PNG, GIF formatında, maksimum 2MB</p>
        @if($emergency->image)
            <div class="mt-3">
                <img src="{{ asset('storage/' . $emergency->image) }}" alt="{{ $emergency->title }}" class="max-w-xs rounded shadow">
            </div>
        @endif
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label for="phone" class="block font-semibold mb-1">Telefon</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $emergency->phone) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('phone') border-red-500 @enderror">
        </div>
        <div>
            <label for="email" class="block font-semibold mb-1">E-posta</label>
            <input type="email" name="email" id="email" value="{{ old('email', $emergency->email) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
        </div>
    </div>
    <div class="mb-4">
        <label for="address" class="block font-semibold mb-1">Adres</label>
        <textarea name="address" id="address" rows="3"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address', $emergency->address) }}</textarea>
    </div>
    <div class="mb-4">
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="mr-2" {{ old('is_active', $emergency->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-gray-700">Yayınla</label>
        </div>
    </div>
    <div class="flex justify-end space-x-2">
        <a href="{{ route('admin.emergency.index') }}" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">İptal</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Güncelle</button>
    </div>
</form>
@endsection