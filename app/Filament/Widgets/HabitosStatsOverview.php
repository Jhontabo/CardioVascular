<?php

namespace App\Filament\Widgets;

use App\Models\Habito;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class HabitosStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Obtener datos promedio de la tabla hábitos
        $promedios = Habito::selectRaw('
            AVG(actividad_fisica) as actividad_fisica_promedio,
            AVG(horas_suenio) as horas_suenio_promedio,
            AVG(hidratacion) as hidratacion_promedio
        ')->first();

        // Si no hay datos, mostrar valores predeterminados
        if (!$promedios) {
            return [
                Card::make('Actividad Física', 'Sin datos')
                    ->description('Minutos diarios promedio')
                    ->color('gray'),

                Card::make('Horas de Sueño', 'Sin datos')
                    ->description('Horas promedio por día')
                    ->color('gray'),

                Card::make('Hidratación', 'Sin datos')
                    ->description('Vasos de agua promedio por día')
                    ->color('gray'),
            ];
        }

        // Retornar estadísticas basadas en los datos
        return [
            Card::make('Actividad Física', round($promedios->actividad_fisica_promedio) . ' min')
                ->description('Minutos diarios promedio')
                ->color($promedios->actividad_fisica_promedio > 30 ? 'success' : 'warning'), // Verde si supera 30 min

            Card::make('Horas de Sueño', round($promedios->horas_suenio_promedio) . ' hrs')
                ->description('Horas promedio por día')
                ->color($promedios->horas_suenio_promedio >= 7 ? 'success' : 'danger'), // Verde si es 7+ horas

            Card::make('Hidratación', round($promedios->hidratacion_promedio) . ' vasos')
                ->description('Vasos de agua promedio por día')
                ->color($promedios->hidratacion_promedio >= 8 ? 'success' : 'warning'), // Verde si supera 8 vasos
        ];
    }
}
