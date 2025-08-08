@extends('layouts.app')

@section('title', 'Hakkımızda - Atakder')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/atakder-about/1920/600.jpg" alt="Hakkımızda" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Hakkımızda</h1>
            <p class="text-xl max-w-2xl mx-auto">Acil Yardım ve Arama Kurtarma Derneği</p>
        </div>
    </section>
    
    <!-- İçerik Bölümü -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-secondary">Atakder Hakkında</h2>
                <div class="prose prose-lg max-w-none">
                    <p class="mb-4">
                        Atakder, afet ve acil durum situationsında ihtiyaç sahiplerine yardım etmek amacıyla kurulmuş bir sivil toplum kuruluşudur. 
                        20XX yılında kurulan derneğimiz, o günden bugüne kadar birçok afet bölgesinde yardım faaliyetleri yürütmüştür.
                    </p>
                    <p class="mb-4">
                        Misyonumuz; afetzedelere hızlı ve etkili müdahale ederek, insani yardım sağlamak ve toplumsal dayanıklılığı artırmaktır. 
                        Vizyonumuz ise Türkiye'nin en etkili afet yardım kuruluşlarından biri olmaktır.
                    </p>
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-secondary">Değerlerimiz</h3>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>İnsani Yardım</li>
                        <li>Şeffaflık</li>
                        <li>Dayanışma</li>
                        <li>Profesyonellik</li>
                        <li>Sorumluluk</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection