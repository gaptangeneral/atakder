@extends('admin.layout')

@section('title', 'Site Ayarları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Site Ayarları</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-3">Genel Ayarlar</h4>
                                
                                <div class="mb-3">
                                    <label for="site_title" class="form-label">Site Başlığı</label>
                                    <input type="text" class="form-control" id="site_title" name="site_title" 
                                           value="{{ old('site_title', $settings['site_title'] ?? config('app.name')) }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="site_description" class="form-label">Site Açıklaması</label>
                                    <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="site_logo" class="form-label">Site Logosu</label>
                                    <input type="file" class="form-control" id="site_logo" name="site_logo" accept="image/*">
                                    @if($settings['site_logo'] ?? null)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Site Logosu" class="img-thumbnail" style="max-height: 100px;">
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="mb-3">
                                    <label for="site_favicon" class="form-label">Site Favicon</label>
                                    <input type="file" class="form-control" id="site_favicon" name="site_favicon" accept="image/*">
                                    @if($settings['site_favicon'] ?? null)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $settings['site_favicon']) }}" alt="Site Favicon" class="img-thumbnail" style="max-height: 32px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h4 class="mb-3">Hero Section</h4>
                                
                                <div class="mb-3">
                                    <label for="hero_title" class="form-label">Hero Başlığı</label>
                                    <input type="text" class="form-control" id="hero_title" name="hero_title" 
                                           value="{{ old('hero_title', $settings['hero_title'] ?? 'Atakder') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="hero_subtitle" class="form-label">Hero Alt Başlığı</label>
                                    <input type="text" class="form-control" id="hero_subtitle" name="hero_subtitle" 
                                           value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? 'Acil Yardım ve Arama Kurtarma Derneği') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="hero_background" class="form-label">Hero Arka Plan</label>
                                    <input type="file" class="form-control" id="hero_background" name="hero_background" accept="image/*">
                                    @if($settings['hero_background'] ?? null)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $settings['hero_background']) }}" alt="Hero Background" class="img-thumbnail" style="max-height: 200px;">
                                        </div>
                                    @endif
                                </div>
                                <!-- Hero Logo Alanı -->
<div class="mb-3">
    <label for="hero_logo" class="form-label">Hero Bölümü Logosu</label>
    <input type="file" class="form-control" id="hero_logo" name="hero_logo" accept="image/*">
    @if($settings['hero_logo'] ?? null)
        <div class="mt-2">
            <p class="form-text text-muted">Mevcut Hero Logosu:</p>
            <img src="{{ asset('storage/' . $settings['hero_logo']) }}" alt="Hero Logosu" class="img-thumbnail" style="max-height: 100px;">
        </div>
    @endif
    <div class="form-text">Hero bölümünde gösterilecek logoyu seçin. Eğer seçmezseniz, site logosu kullanılır.</div>
</div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h4 class="mb-3">İletişim Bilgileri</h4>
                                
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">E-posta</label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" 
                                           value="{{ old('contact_email', $settings['contact_email'] ?? 'info@atakder.org.tr') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" 
                                           value="{{ old('contact_phone', $settings['contact_phone'] ?? '+90 (212) 123 45 67') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="contact_address" class="form-label">Adres</label>
                                    <textarea class="form-control" id="contact_address" name="contact_address" rows="2">{{ old('contact_address', $settings['contact_address'] ?? 'Örnek Mahalle, Örnek Sokak No:1, İstanbul') }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h4 class="mb-3">Sosyal Medya</h4>
                                
                                <div class="mb-3">
                                    <label for="social_facebook" class="form-label">Facebook</label>
                                    <input type="url" class="form-control" id="social_facebook" name="social_facebook" 
                                           value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="social_twitter" class="form-label">Twitter</label>
                                    <input type="url" class="form-control" id="social_twitter" name="social_twitter" 
                                           value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="social_instagram" class="form-label">Instagram</label>
                                    <input type="url" class="form-control" id="social_instagram" name="social_instagram" 
                                           value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="social_youtube" class="form-label">YouTube</label>
                                    <input type="url" class="form-control" id="social_youtube" name="social_youtube" 
                                           value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection