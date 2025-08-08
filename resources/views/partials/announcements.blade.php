<!-- Duyurular Section -->
@php
    $activeAnnouncements = \App\Models\Announcement::where('is_active', true)
        ->orderBy('order', 'asc')
        ->get();
@endphp

@if($activeAnnouncements->count() > 0)
<div class="bg-secondary text-white py-2 overflow-hidden">
    <div class="flex scroll-left whitespace-nowrap">
        @foreach($activeAnnouncements as $announcement)
            <span class="mx-4">
                <i class="fas fa-bullhorn mr-2"></i> 
                {{ $announcement->title }}: {{ Str::limit(strip_tags($announcement->content), 100) }}
            </span>
        @endforeach
    </div>
</div>
@endif