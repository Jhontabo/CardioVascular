<?php

namespace App\Filament\Resources\EvaluacionResource\Pages;

use App\Filament\Resources\EvaluacionResource;
use App\Filament\Widgets\RiesgoCardiovascularChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvaluacions extends ListRecords
{
    protected static string $resource = EvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            RiesgoCardiovascularChart::class
        ];
    }
}
