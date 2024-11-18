<?php

namespace App\Filament\Resources\EvaluacionResource\Pages;

use App\Filament\Resources\EvaluacionResource;
use App\Filament\Widgets\AlertaRiesgo;
use App\Filament\Widgets\RiesgoCardiovascularChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\PorcentajeRiesgo;

class ListEvaluacions extends ListRecords
{
    protected static string $resource = EvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            AlertaRiesgo::class,
            RiesgoCardiovascularChart::class,
            PorcentajeRiesgo::class,
        ];
    }
}
