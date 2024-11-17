<?php

namespace App\Filament\Widgets;

use App\Models\Evaluacion;
use Filament\Widgets\ChartWidget;

class RiesgoCardiovascularChart extends ChartWidget
{
    protected static ?string $heading = 'Riesgo Cardiovascular';

    protected function getData(): array
    {
        $evaluaciones = Evaluacion::with('user')->get();

        $labels = $evaluaciones->pluck('user.name')->toArray();
        $data = $evaluaciones->map(function ($evaluacion) {
            $riesgo = 0;
            $riesgo += $evaluacion->sistolica > 140 ? 30 : 0;
            $riesgo += $evaluacion->diastolica > 90 ? 20 : 0;
            $riesgo += $evaluacion->colesterol > 200 ? 20 : 0;
            $riesgo += $evaluacion->antecedentes ? 30 : 0;
            return min($riesgo, 100);
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Nivel de Riesgo (%)',
                    'data' => $data,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
