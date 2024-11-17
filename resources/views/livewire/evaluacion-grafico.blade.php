<div>
    <h2>Gráfico de Evaluación de Riesgo</h2>
    <canvas id="graficoEvaluacion"></canvas>
    <script>
        document.addEventListener('livewire:load', function() {
            const ctx = document.getElementById('graficoEvaluacion').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Riesgo Cardiovascular',
                        data: @json($data),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    },
                },
            });
        });
    </script>
</div>
