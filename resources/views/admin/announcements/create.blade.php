<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Yeni Duyuru Ekle - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6">Yeni Duyuru Ekle</h1>

        <form action="{{ route('admin.announcements.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700 mb-1">Başlık</label>
                <input type="text" id="title" name="title" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="content" class="block font-medium text-gray-700 mb-1">İçerik</label>
                <textarea id="content" name="content" rows="5" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1" class="mr-2" />
                <label for="is_active" class="font-medium text-gray-700">Aktif</label>
            </div>

            <div class="mb-6">
                <label for="order" class="block font-medium text-gray-700 mb-1">Sıra</label>
                <input type="number" id="order" name="order" value="0" required
                    class="w-24 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">Kaydet</button>
            <a href="{{ route('admin.announcements.index') }}"
                class="ml-4 text-gray-600 hover:text-gray-900">Geri Dön</a>
        </form>
    </div>
</body>
</html>
