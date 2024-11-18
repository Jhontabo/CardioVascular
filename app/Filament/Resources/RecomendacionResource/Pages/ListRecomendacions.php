<?php

namespace App\Filament\Resources\RecomendacionResource\Pages;

use App\Filament\Resources\RecomendacionResource;
use App\Filament\Widgets\recomendaciones;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecomendacions extends ListRecords
{
    protected static string $resource = RecomendacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            recomendaciones::class,
        ];
    }
}
