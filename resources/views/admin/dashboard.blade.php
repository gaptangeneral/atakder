@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Hoş Geldiniz, {{ Auth::guard('admin')->user()->name }}</h2>
    <p class="text-gray-600">Admin paneline hoş geldiniz. Aşağıdaki istatistikleri inceleyebilirsiniz.</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Toplam Kullanıcı</p>
                <p class="text-2xl font-bold text-gray-900">1,254</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-500">
                <i class="fas fa-image text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Galeri Resimleri</p>
                <p class="text-2xl font-bold text-gray-900">86</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                <i class="fas fa-newspaper text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Haberler</p>
                <p class="text-2xl font-bold text-gray-900">24</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-500">
                <i class="fas fa-envelope text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Mesajlar</p>
                <p class="text-2xl font-bold text-gray-900">18</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Son Aktiviteler</h3>
    <div class="space-y-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-user text-blue-500 text-sm"></i>
                </div>
            </div>
            <div class="ml-3">
                <p class="text-sm text-gray-800">Yeni kullanıcı kaydoldu: <span class="font-medium">Ahmet Yılmaz</span></p>
                <p class="text-xs text-gray-500">2 saat önce</p>
            </div>
        </div>
        
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-image text-green-500 text-sm"></i>
                </div>
            </div>
            <div class="ml-3">
                <p class="text-sm text-gray-800">Yeni galeri resmi eklendi</p>
                <p class="text-xs text-gray-500">5 saat önce</p>
            </div>
        </div>
        
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                    <i class="fas fa-newspaper text-yellow-500 text-sm"></i>
                </div>
            </div>
            <div class="ml-3">
                <p class="text-sm text-gray-800">Haber güncellendi: <span class="font-medium">Deprem Eğitimleri</span></p>
                <p class="text-xs text-gray-500">1 gün önce</p>
            </div>
        </div>
    </div>
</div>
@endsection