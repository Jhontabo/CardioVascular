<?php

namespace App\Filament\Widgets;

use App\Models\Habito;
use Filament\Widgets\ChartWidget;

class PorcentajeHabitos extends ChartWidget
{
    protected static ?string $heading = 'Distribución de Hábitos';

    protected function getType(): string
    {
        return 'pie'; // Cambiar a 'doughnut' si prefieres este estilo
    }

    protected function getData(): array
    {
        // Obtener datos agrupados de la tabla hábitos
        $habitos = Habito::selectRaw('
                AVG(actividad_fisica) as actividad_fisica_promedio,
                AVG(horas_suenio) as horas_suenio_promedio,
                AVG(hidratacion) as hidratacion_promedio
            ')
            ->first(); // Solo necesitamos un conjunto agregado

        // Verificar si hay datos disponibles
        if (!$habitos) {
            return [
                'datasets' => [
                    [
                        'data' => [0, 0, 0],
                        'backgroundColor' => ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                        'borderColor' => ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                        'borderWidth' => 1,
                    ],
                ],
                'labels' => ['Actividad Física', 'Horas de Sueño', 'Hidratación'],
            ];
        }

        return [
            'datasets' => [
                [
                    'data' => [
                        $habitos->actividad_fisica_promedio,
                        $habitos->horas_suenio_promedio,
                        $habitos->hidratacion_promedio,
                    ],
                    'backgroundColor' => ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                    'borderColor' => ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Actividad Física', 'Horas de Sueño', 'Hidratación'],
        ];
    }
}
