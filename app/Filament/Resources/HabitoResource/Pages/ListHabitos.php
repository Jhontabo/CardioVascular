<?php

namespace App\Filament\Resources\HabitoResource\Pages;

use App\Filament\Resources\HabitoResource;
use App\Filament\Widgets\HabitosChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\PorcentajeHabitos;
use App\Filament\Widgets\HabitosStatsOverview;

class ListHabitos extends ListRecords
{
    protected static string $resource = HabitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    protected function getFooterWidgets(): array
    {
        return [
            HabitosStatsOverview::class,
            HabitosChart::class,
            PorcentajeHabitos::class,

        ];
    }
}
