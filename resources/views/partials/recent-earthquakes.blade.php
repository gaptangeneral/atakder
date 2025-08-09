<!-- Son Depremler Section -->
<div class="bg-gray-100 py-2 overflow-hidden">
    <div id="earthquake-ticker" class="flex scroll-left whitespace-nowrap">
        <!-- Deprem verileri buraya JS ile eklenecek -->
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/earthquakes')
        .then(res => res.json())
        .then(data => {
            console.log("API'den dönen veri:", data); // 🔍 Saat alanını burada görebileceğiz
            const container = document.getElementById('earthquake-ticker');
            container.innerHTML = ''; // Önce temizle

            if (data.length === 0) {
                container.innerHTML = '<span class="mx-4">Son deprem verisi bulunamadı.</span>';
                return;
            }

            data.forEach(eq => {
                // Eğer time yoksa, farklı bir alanı (ör. date, eventDate vs.) dene
                const eqTime = eq.time || eq.date || eq.eventDate || eq.origin_time || 'Bilinmiyor';

                const span = document.createElement('span');
                span.classList.add('mx-4');
                span.innerHTML = `
                    <i class="fas fa-exclamation-triangle mr-2 text-red-500"></i> 
                    Son Depremler: ${eq.location} | Saat: ${eqTime} | Derinlik: ${eq.depth} Km | Tip: ${eq.type} | Büyüklük: ${eq.magnitude}
                `;
                container.appendChild(span);
            });
        })
        .catch(err => {
            console.error('Deprem verisi alınamadı:', err);
            const container = document.getElementById('earthquake-ticker');
            container.innerHTML = '<span class="mx-4">Deprem verisi alınamadı.</span>';
        });
});
</script>

<style>
.scroll-left {
  animation: scroll-left 20s linear infinite;
}
@keyframes scroll-left {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}
</style>
