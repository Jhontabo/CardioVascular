<?php

namespace App\Filament\Widgets;

use App\Models\Evaluacion;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class AlertaRiesgo extends BaseWidget
{
    protected function getStats(): array
    {
        $evaluacion = Evaluacion::where('user_id', auth()->id())->latest()->first();

        if (!$evaluacion) {
            return [
                Card::make('Nivel de Riesgo', 'Sin evaluación registrada')
                    ->description('Por favor, registre su evaluación')
                    ->color('gray'),
                Card::make('Colesterol', 'Sin datos')->color('gray'),
                Card::make('Presión Sistólica', 'Sin datos')->color('gray'),
                Card::make('Presión Diastólica', 'Sin datos')->color('gray'),
            ];
        }

        $riesgo = $this->calcularRiesgo($evaluacion);
        $riesgoTexto = $this->determinarNivelRiesgo($riesgo);

        return [
            // Nivel de Riesgo
            Card::make('Nivel de Riesgo', "$riesgo% ($riesgoTexto)")
                ->description('Basado en su última evaluación')
                ->color($this->determinarColor($riesgo)),

            // Detalle de Colesterol
            Card::make('Colesterol', "{$evaluacion->colesterol} mg/dL")
                ->description($evaluacion->colesterol > 200 ? 'Elevado' : 'Normal')
                ->color($evaluacion->colesterol > 200 ? 'danger' : 'success'),

            // Detalle de Presión Sistólica
            Card::make('Presión Sistólica', "{$evaluacion->sistolica} mmHg")
                ->description($evaluacion->sistolica > 140 ? 'Elevada' : 'Normal')
                ->color($evaluacion->sistolica > 140 ? 'danger' : 'success'),

            // Detalle de Presión Diastólica
            Card::make('Presión Diastólica', "{$evaluacion->diastolica} mmHg")
                ->description($evaluacion->diastolica > 90 ? 'Elevada' : 'Normal')
                ->color($evaluacion->diastolica > 90 ? 'danger' : 'success'),
        ];
    }

    /**
     * Calcular el nivel de riesgo cardiovascular.
     */
    private function calcularRiesgo(Evaluacion $evaluacion): int
    {
        $riesgo = 0;
        $riesgo += $evaluacion->sistolica > 140 ? 30 : 0;
        $riesgo += $evaluacion->diastolica > 90 ? 20 : 0;
        $riesgo += $evaluacion->colesterol > 200 ? 20 : 0;
        $riesgo += $evaluacion->antecedentes ? 30 : 0;

        return min($riesgo, 100); // Máximo 100%
    }

    /**
     * Determinar el nivel de riesgo cardiovascular.
     */
    private function determinarNivelRiesgo(int $riesgo): string
    {
        if ($riesgo < 30) {
            return 'Bajo';
        } elseif ($riesgo < 70) {
            return 'Moderado';
        } else {
            return 'Alto';
        }
    }

    /**
     * Determinar el color según el nivel de riesgo.
     */
    private function determinarColor(int $riesgo): string
    {
        if ($riesgo < 30) {
            return 'success'; // Verde
        } elseif ($riesgo < 70) {
            return 'warning'; // Amarillo
        } else {
            return 'danger'; // Rojo
        }
    }
}
