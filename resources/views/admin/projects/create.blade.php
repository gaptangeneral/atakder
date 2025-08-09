@extends('admin.layout')
@section('title', 'Yeni Proje Ekle')

@section('content')
<h1 class="text-3xl font-bold mb-6">Yeni Proje Ekle</h1>

@if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow max-w-2xl">
    @csrf
    <div class="mb-4">
        <label for="title" class="block font-semibold mb-1">Proje Başlığı *</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
    </div>
    <div class="mb-4">
        <label for="description" class="block font-semibold mb-1">Proje Açıklaması *</label>
        <textarea name="description" id="description" rows="5" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
    </div>
    <div class="mb-4">
        <label for="image" class="block font-semibold mb-1">Proje Görseli</label>
        <input type="file" name="image" id="image" accept="image/*"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
        <p class="text-sm text-gray-500 mt-1">JPG, PNG, GIF formatında, maksimum 2MB</p>
    </div>
    <div class="mb-4">
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="mr-2" {{ old('is_active', 1) ? 'checked' : '' }}>
            <label for="is_active" class="text-gray-700">Projeyi yayınla</label>
        </div>
    </div>
    <div class="flex justify-end space-x-2">
        <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">İptal</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kaydet</button>
    </div>
</form>
@endsection