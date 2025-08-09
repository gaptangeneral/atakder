@extends('layouts.app')
@section('title', 'Projelerimiz - Atakder')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-projects/1920/600.jpg" alt="Projelerimiz" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Projelerimiz</h1>
            <p class="text-xl max-w-2xl mx-auto">Yürüttüğümüz Projeler</p>
        </div>
    </section>
    
    <!-- Projeler Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($projects as $project)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        @else
                            <img src="https://picsum.photos/seed/proje{{ $project->id }}/800/400.jpg" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-secondary">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 150) }}</p>
                            <a href="#" class="text-primary font-medium inline-flex items-center">
                                Detaylı Bilgi <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">Henüz proje bulunmamaktadır.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        // Mobil menü fonksiyonları
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }
        
        function toggleMobileDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }
        
        // Header scroll efekti
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.sticky-header');
            if (window.scrollY > 100) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }
        });
    </script>
@endsection