@extends('admin.layout')
@section('title', 'Yeni Online Kurs Bilgisi Ekle')

@section('content')
<h1 class="text-3xl font-bold mb-6">Yeni Online Kurs Bilgisi Ekle</h1>

@if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.online-courses.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow max-w-2xl">
    @csrf
    <div class="mb-4">
        <label for="title" class="block font-semibold mb-1">Başlık *</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
    </div>
    <div class="mb-4">
        <label for="content" class="block font-semibold mb-1">İçerik *</label>
        <textarea name="content" id="content" rows="10" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
    </div>
    <div class="mb-4">
        <label for="image" class="block font-semibold mb-1">Görsel</label>
        <input type="file" name="image" id="image" accept="image/*"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
        <p class="text-sm text-gray-500 mt-1">JPG, PNG, GIF formatında, maksimum 2MB</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label for="duration" class="block font-semibold mb-1">Süre</label>
            <input type="text" name="duration" id="duration" value="{{ old('duration') }}" placeholder="Örn: 4 Hafta"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('duration') border-red-500 @enderror">
        </div>
        <div>
            <div class="flex items-center mt-6">
                <input type="hidden" name="has_certificate" value="0">
                <input type="checkbox" name="has_certificate" value="1" id="has_certificate" class="mr-2" {{ old('has_certificate', 1) ? 'checked' : '' }}>
                <label for="has_certificate" class="text-gray-700">Sertifika Var</label>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="mr-2" {{ old('is_active', 1) ? 'checked' : '' }}>
            <label for="is_active" class="text-gray-700">Yayınla</label>
        </div>
    </div>
    <div class="flex justify-end space-x-2">
        <a href="{{ route('admin.online-courses.index') }}" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">İptal</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kaydet</button>
    </div>
</form>
@endsection