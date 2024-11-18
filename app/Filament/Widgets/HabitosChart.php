<?php

namespace App\Filament\Widgets;

use App\Models\Habito;
use Filament\Widgets\ChartWidget;

class HabitosChart extends ChartWidget
{
    protected static ?string $heading = 'Tendencia de Hábitos Diarios';

    protected function getData(): array
    {
        // Obtener los hábitos agrupados por fecha con `groupByRaw`
        $habitos = Habito::selectRaw('fecha, AVG(actividad_fisica) as actividad_fisica, AVG(horas_suenio) as horas_suenio, AVG(hidratacion) as hidratacion')
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();


        // Extraer etiquetas y datos
        $labels = $habitos->pluck('fecha')->toArray(); // Fechas en el eje X
        $actividadFisica = $habitos->pluck('actividad_fisica')->toArray();
        $horasSueno = $habitos->pluck('horas_suenio')->toArray();
        $hidratacion = $habitos->pluck('hidratacion')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Actividad Física (min)',
                    'data' => $actividadFisica,
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => true,
                ],
                [
                    'label' => 'Horas de Sueño',
                    'data' => $horasSueno,
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ],
                [
                    'label' => 'Hidratación (vasos)',
                    'data' => $hidratacion,
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Gráfico de líneas
    }
}
