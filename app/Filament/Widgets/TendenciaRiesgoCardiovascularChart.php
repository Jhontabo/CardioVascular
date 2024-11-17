<?php

namespace App\Filament\Widgets;

use App\Models\Evaluacion;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class TendenciaRiesgoCardiovascularChart extends ChartWidget
{
    protected static ?string $heading = 'Tendencia del Riesgo Cardiovascular';

    protected function getData(): array
    {
        // Obtener las evaluaciones de los últimos 30 días
        $evaluaciones = Evaluacion::where('created_at', '>=', Carbon::now()->subDays(30))
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d'); // Agrupar por día
            });

        $labels = [];
        $data = [];

        foreach ($evaluaciones as $date => $evaluations) {
            $labels[] = $date;
            $totalRiesgo = 0;
            $count = count($evaluations);

            foreach ($evaluations as $evaluacion) {
                $riesgo = 0;
                $riesgo += $evaluacion->sistolica > 140 ? 30 : 0;
                $riesgo += $evaluacion->diastolica > 90 ? 20 : 0;
                $riesgo += $evaluacion->colesterol > 200 ? 20 : 0;
                $riesgo += $evaluacion->antecedentes ? 30 : 0;
                $totalRiesgo += min($riesgo, 100);
            }

            $data[] = $count > 0 ? round($totalRiesgo / $count, 2) : 0; // Promedio diario
        }

        return [
            'datasets' => [
                [
                    'label' => 'Riesgo Promedio (%)',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 2,
                    'tension' => 0.3, // Suavizar la línea
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): ?array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Riesgo Promedio (%)',
                    ],
                ],
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Fecha',
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Tendencia del Riesgo Cardiovascular en los Últimos 30 Días',
                ],
            ],
        ];
    }
}
