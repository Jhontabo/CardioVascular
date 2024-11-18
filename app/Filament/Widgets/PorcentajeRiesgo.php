<?php

namespace App\Filament\Widgets;

use App\Models\Evaluacion;
use Filament\Widgets\ChartWidget;

class PorcentajeRiesgo extends ChartWidget
{
    protected static ?string $heading = 'Distribución de Factores de Riesgo Cardiovascular';

    protected function getType(): string
    {
        return 'doughnut'; // Cambia a 'pie' si prefieres ese tipo de gráfico
    }

    protected function getData(): array
    {
        // Obtener la última evaluación del usuario autenticado
        $ultimaEvaluacion = Evaluacion::where('user_id', auth()->id())->latest()->first();

        if (!$ultimaEvaluacion) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        // Extraer las métricas relevantes
        $data = [
            'Colesterol' => $ultimaEvaluacion->colesterol,
            'Presión Sistólica' => $ultimaEvaluacion->sistolica,
            'Presión Diastólica' => $ultimaEvaluacion->diastolica,
        ];

        // Colores personalizados para cada métrica
        $backgroundColors = [
            'rgba(54, 162, 235, 0.2)', // Azul para Colesterol
            'rgba(255, 99, 132, 0.2)', // Rojo para Presión Sistólica
            'rgba(255, 206, 86, 0.2)', // Amarillo para Presión Diastólica
        ];

        $borderColors = [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 206, 86, 1)',
        ];

        return [
            'datasets' => [
                [
                    'data' => array_values($data), // Valores de las métricas
                    'backgroundColor' => $backgroundColors,
                    'borderColor' => $borderColors,
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_keys($data), // Etiquetas para el gráfico
        ];
    }
}
