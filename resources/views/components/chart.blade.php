<div class="bg-[#18181B] border border-white/10 rounded-xl px-6 py-4">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-[#DEB8FF]">
            {{ $title }}
        </h2>

        <p class="text-sm text-white font-semibold">
            {{ $description }}
        </p>
    </div>
    <canvas id="{{ $chartId }}"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('{{ $chartId }}');

        new Chart(ctx, {
            type: '{{ $type }}',
            data: {
                labels: @json($labels),
                datasets: [{
                    data: @json($data),
                    label: '{{ $datasetLabel }}',
                    borderWidth: 2,
                    borderRadius: 12,
                    backgroundColor: 'rgba(151, 71, 255, 0.5)',
                    borderColor: 'rgba(151, 71, 255, 1)',
                }]
            },
            options: {
                responsive: true,
                labels: {
                    color: '#FFFFFF'
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#FFFFFF'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#FFFFFF'
                        }
                    }
                }
            }
        });
    });
</script>