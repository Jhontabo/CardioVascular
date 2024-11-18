<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Recomendacion;

class recomendaciones extends BaseWidget
{
    protected function getStats(): array
    {
        $recomendaciones = Recomendacion::latest()->take(3)->get(); // Obtén las últimas 3 recomendaciones

        // Mapea las recomendaciones como tarjetas
        $cards = $recomendaciones->map(function ($recomendacion) {
            return Card::make($recomendacion->titulo, $recomendacion->descripcion)
                ->description('Tipo: ' . ucfirst($recomendacion->tipo))
                ->color('primary');
        });

        return $cards->toArray();
    }
}
