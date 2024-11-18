<?php
namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Recomendacion;

class Recomendaciones extends BaseWidget
{
    protected function getStats(): array
    {
        $recomendaciones = Recomendacion::latest()->take(3)->get(); // Obtén las últimas 3 recomendaciones

        // Validar si no hay recomendaciones
        if ($recomendaciones->isEmpty()) {
            return [
                Card::make('Sin Recomendaciones', 'Actualmente no hay recomendaciones disponibles.')
                    ->color('gray'),
            ];
        }

        // Mapea las recomendaciones como tarjetas
        $cards = $recomendaciones->map(function ($recomendacion) {
            return Card::make(
                $recomendacion->titulo ?? 'Sin Título',
                $recomendacion->descripcion ?? 'Sin Descripción'
            )
                ->description('Tipo: ' . ucfirst($recomendacion->tipo ?? 'Desconocido'))
                ->color('primary');
        });

        return $cards->toArray();
    }
}
