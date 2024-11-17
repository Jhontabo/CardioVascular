<?php
namespace App\Filament\Widgets;

use App\Models\Evaluacion;
use Filament\Widgets\Widget;

class EvaluacionChartWidget extends Widget
{
    protected static string $view = 'filament.widgets.evaluacion-chart-widget';

    public function getData(): array
    {
        $evaluaciones = Evaluacion::all();

        $riesgos = $evaluaciones->map(function ($evaluacion) {
            $riesgo = 0;
            $riesgo += $evaluacion->sistolica > 140 ? 30 : 0;
            $riesgo += $evaluacion->diastolica > 90 ? 20 : 0;
            $riesgo += $evaluacion->colesterol > 200 ? 20 : 0;
            $riesgo += $evaluacion->antecedentes ? 30 : 0;
            return min($riesgo, 100);
        });

        return [
            'labels' => $evaluaciones->pluck('user.name')->toArray(),
            'data' => $riesgos->toArray(),
        ];
    }
}
